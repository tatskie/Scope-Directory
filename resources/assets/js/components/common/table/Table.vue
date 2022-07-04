<template>
  <div class="table-wrap">
    <div class="table">
      <div class="table-inner">
        <div class="table-head">
          <div class="table-tr">
            <slot name="head"></slot>
          </div>
        </div>

        <div class="table-body">
          <slot name="body"></slot>
        </div>
      </div>
    </div>

    <div
      class="table-footer"
      v-if="hasFooter"
    >
      <slot name="footer"></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Tbl',

  provide () {
    const tblConfig = this.tblConfig
    return { tblConfig }
  },

  data () {
    return {
      tblConfig: {
        asc: false
      }
    }
  },

  computed: {
    hasFooter () {
      return this.$slots['footer']
    }
  }
}
</script>
