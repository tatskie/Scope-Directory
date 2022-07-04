<template>
  <div
    class="table-footer"
    ref="tableFooter"
    :style="tableFooterWidth"
  >
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: 'TblFooter',

  inject: {
    tblConfig: {}
  },

  computed: {
    tableFooterWidth () {
      // let width = this.tblConfig.body_w
      //
      // return {
      //   'max-width': width + 'px'
      // }
    }
  }
}
</script>
