<template>
  <div
    class="table-head"
    ref="tableHead"
    :style="tableBodyConfig"
  >
    <div
      class="table"
      ref="thead"
    >
      <div class="thead">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
//= mixins
// import { detectDevice } from '@/assets/js/mixins/base/DetectDevice'

export default {
  name: 'TblHead',

  mixin: [
    detectDevice
  ],

  inject: {
    tblConfig: {}
  },
}
</script>
