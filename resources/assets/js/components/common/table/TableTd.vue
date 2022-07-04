<template>
  <div
    class="table-td"
    ref="td"
  >
    <div class="td-text" v-if="!isHtml">
      <slot></slot>
    </div>

    <div class="td-text td-text-ellipsis" v-html="logs" v-else>
      <slot></slot>
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
