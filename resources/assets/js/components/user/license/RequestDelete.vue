<template>
	<div>
    <div class="btn-delete -withlabel" @click="modalTrigger()">
      Delete my data&nbsp;<i class="fa fa-exclamation-circle" style="font-size:16px;color:#fff"></i>
    </div>
    <modal
      :title="'Request Delete Data'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-horizontal" enctype="multipart/form-data">
            <div class="form-item">
              Are you sure you want to delete your data?
            </div>
            <div class="form-btn">
              <button class="btn-delete -withlabel">
                <i class="ico-delete"></i>
                <span>Delete</span>
              </button>
            </div>
          </form>
        </div>
      </template>
    </modal>
  </div>


</template>

<script>
   // import QuestionModal from './QuestionModal'
  import '../../common/table/Table'

  import Modal from '../../common/Modal'

    export default {
      components: {
        // "modal-question": QuestionModal,
        Modal
      },

      data () {
        return {
          showModal: false,
        }
      },

      created () {

      },

      methods: {
        modalTrigger() {
          this.showModal = true;
        }
    }
  }
</script>