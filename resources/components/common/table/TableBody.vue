<template>
  <div
    class="table-body"
    ref="tableBody"
    :style="tableBodyConfig"
  >
    <div
      class="table"
      ref="table"
    >
      <div class="tbody">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
//= mixins
// import { detectDevice } from '@/assets/js/mixins/base/DetectDevice'

export default {
  name: 'TblBody',

  inject: {
    tblConfig: {}
  },
}
</script>
