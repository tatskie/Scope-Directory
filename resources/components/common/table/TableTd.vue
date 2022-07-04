<template>
  <div
    class="table__td"
    ref="td"
  >
    </div>

      <div
        class="td__text"
        v-if="!isHtml"
      >
        <slot></slot>
      </div>

      <div
        class="td__text td__text-ellipsis"
        v-html="logs"
        v-else
      >
      </div>
  </div>
</template>

<script>
export default {
  name: 'TblTd',

  props: {
    sort: {
      type: Boolean,
      default: false
    },

    name: {
      type: [ String ]
    },

    isHtml: {
      type: Boolean,
      default: false
    },

    logs: {
      type: [ String ]
    }
  },

  inject: {
    tblConfig: {}
  }
}
</script>
