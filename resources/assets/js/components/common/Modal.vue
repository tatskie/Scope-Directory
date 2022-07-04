<!--
  @USE AS:
  import Modal from '@/components/base/Modal'

  components: { Modal }

  <button @click="test = true">MODAL</button>

  <modal
    title="test"
    v-if="test"
    :activate="test"
    :draggable="true"
    @activate="test = $event"
  >
    <template slot="toolbar">
      toolbar
    </template>

    <template slot="body">
      body
    </template>

    <template slot="footer">
      footer
    </template>
  </modal>
-->

<template>
  <transition name="fade" v-if="show">
    <div class="modal" :class="customClass">
      <div
        class="modal-inner"
        ref="modalInner"
        :style="customStyles ? customStyles : ''"
      >
        <div
          class="modal-header"
          ref="modalHeader"
          :class="'-' + headerClass"
        >
          <div class="modal-header-inner">
            <h3
              class="modal-title"
              ref="modalTitle"
              v-if="title"
              v-html="title"
              :style="`width: ${this.title_w}px`"
            >
            </h3>

            <div class="modal-buttons" ref="modalButtons">
              <button
                class="btn-popup-close"
                @click="closeModal()"
              >
                <i class="ico-close"></i>
              </button>
            </div>
          </div>
        </div>

        <div
          class="modal-body"
          ref="modalBody"
          :style="setModalBodyHeight"
          v-if="hasBody"
        >
          <div class="modal-body-inner">
            <slot name="body"></slot>
          </div>

          <div
            class="modal-footer"
            ref="modalFooter"
            v-if="hasFooter"
          >
            <div class="modal-footer-inner">
              <slot name="footer"></slot>
            </div>
          </div>
        </div>


      </div>
    </div>
  </transition>
</template>

<script>
import Vue from 'vue'

//= jquery
import $ from 'jquery'

//= mixins
import { detectDevice } from '../../DetectDevice'

export default {
  name: 'Modal',

  mixins: [
    detectDevice
  ],

  props: {
    activate: Boolean,
    title: String,
    customId: String,
    customClass: String,
    customStyles: [Object, Array],
    logs: [Object, Array],

    draggable: {
      type: [String, Boolean],
      default: false
    },

    bodyOverflow: {
      type: Boolean,
      default: false
    },

    isChatbox: {
      type: Boolean,
      default: false
    }
  },

  data () {
    return {
      show: false,

      headerClass: '',
      title_w: '',
      toolbar_w: 'auto',

      modalBody: 'auto'
    }
  },

  computed: {
    hasToolbar () {
      return this.$slots['toolbar']
    },

    hasBody () {
      return this.$slots['body']
    },

    hasFooter () {
      return this.$slots['footer']
    },

    setModalBodyHeight () {
      let height = this.modalBody

      if (height !== 'auto') {
        height = height + 'px'
      }

      if (this.device_height > 799) {
        if (this.device_width > 991) {
          return { 'max-height': height }
        }
      }
    },

    setToolbar_w () {
      let width = this.toolbar_w

      if (width !== 'auto') {
        width = width + 'px'
      }

      return width
    }
  },

  watch: {
    activate () {
      if (this.activate) {
        this.modalActive()
      }

      if (!this.activate) {
        this.closeModal()
      }
    }
  },

  mounted () {
    this.$nextTick(() => {
      window.addEventListener('resize', this.setWidth)
      this.setWidth()

      window.addEventListener('resize', this.getModalBodyHeight)
      this.getModalBodyHeight()

      this.setHeaderClass()
    })

    if (this.activate) {
      this.modalActive()
    }
  },

  beforeDestroy () {
    window.removeEventListener('resize', this.setWidth)
    window.removeEventListener('resize', this.getModalBodyHeight)
  },

  methods: {
    setHeaderClass () {
      var title = $('.modal-title').outerWidth()
      var toolbar = $('.modal-toolbar').outerWidth()
      var buttons = $('.modal-buttons').outerWidth()

      if (typeof title !== 'undefined' && typeof toolbar !== 'undefined' && typeof buttons !== 'undefined') {
        this.headerClass = 'title-button-toolbar'
      }

      if (typeof title !== 'undefined' && typeof toolbar === 'undefined' && typeof buttons !== 'undefined') {
        this.headerClass = 'title-button'
      }

      if (typeof title === 'undefined' && typeof toolbar !== 'undefined' && typeof buttons !== 'undefined') {
        this.headerClass = 'button-toolbar'
      }

      if (typeof title === 'undefined' && typeof toolbar === 'undefined' && typeof buttons !== 'undefined') {
        this.headerClass = 'button'
      }
    },

    getModalBodyHeight () {
      this.$nextTick(() => {
        let modalHeader = this.$refs.modalHeader.offsetHeight
        let browserHeight = this.device_height
        let padding = 45

        if (this.device_height > 799) {
          if (this.device_width > 991) {
            if (this.$refs.modalFooter) {
              let modalFooter = this.$refs.modalFooter.offsetHeight
              this.modalBody = browserHeight - modalHeader - modalFooter - padding
            } else {
              this.modalBody = browserHeight - modalHeader - padding
            }
          }
        }
      })
    },

    setWidth () {
      this.$nextTick(() => {
        var modalWidth = this.$refs.modalInner
        var title = this.$refs.modalTitle
        var toolbar = this.$refs.modalToolbar
        var buttons = this.$refs.modalButtons

        if (title && !buttons && !toolbar) {
          this.title_w = modalWidth.offsetWidth - 10
        }

        if (title && buttons && !toolbar) {
          this.title_w = modalWidth.offsetWidth - buttons.offsetWidth - 4 - 10
        }

        if (title && buttons && toolbar) {
          this.title_w = modalWidth.offsetWidth - buttons.offsetWidth - toolbar.offsetWidth - (4 * 2) - 10
        }

        if (!title && !toolbar && buttons) {
          this.title_w = ''
        }

        if (!title && toolbar && buttons) {
          this.toolbar_w = modalWidth.offsetWidth - buttons.offsetWidth - 4 - 10
        }
      })
    },


    closeModal () {
      this.show = false
      this.$emit('activate', this.show)
      $('body').removeAttr('style')
      $('body').removeClass('modal-open')
    },

    closeChatbox () {
      this.closeModal()
      this.$emit('closeChatbox', '')
    },

    modalActive () {
      this.show = true
      $('body').addClass('modal-open')

      if (this.bodyOverflow === false) {
        $('body').css({ 'overflow': 'hidden' })
      }
    },
  }
}
</script>
