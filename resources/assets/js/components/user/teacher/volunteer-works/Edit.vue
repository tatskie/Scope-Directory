<template>
  <div class="video">
    <div class="btn-edit -icon" @click="modalTrigger()">
      <i class="ico-edit"></i>
    </div>
    <modal
      :title="'Edit Volunteer Work'"
      class="modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="contents-body" v-if="loading">
          <div class="emptylist">
            <img src="/assets/images/loading/loading.gif">
          </div>
        </div>
        <div class="form" v-else>
          <form class="form-horizontal" @submit.prevent="updateVolunteer" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">

          <div class="form-item">
            <label for="volunteer_work">Volunteer Work</label>

            <div class="editor-body">
              <vue-editor v-model="form.volunteer_work" />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('volunteer_work')">
                  <strong v-text="form.errors.get('volunteer_work')"></strong>
              </span>
            </div>
          </div>

          <div class="form-btn">
            <button class="btn-update -withlabel">
              <i class="ico-update"></i>
              <span>Update</span>
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
  import '../../../common/table/Table'

  import Modal from '../../../common/Modal'
  import { VueEditor } from "vue2-editor"

    export default {
      props: ['volunteerWork'],

      components: {
        // "modal-question": QuestionModal,
        Modal
      },

      data () {
        return {
          showModal: false,
          loading: true,
          years: [],
          form : new Form({
            id: '',
            volunteer_work: ''
          })
        }
      },

      created () {
        //
      },

      methods: {
        modalTrigger() {
          this.loading = true;
          this.showModal = true;
          this.form.fill(this.volunteerWork);
          this.loading = false;
        },

        updateVolunteer() {
          this.form.put('/api/teacher/volunteer/'+this.form.id)
            .then(()=>{
              location.reload();
              Toast.fire({
                  type: 'success',
                  title: 'Volunteer Work Updated Successfully!'
              });
              
              this.showModal = false;
            })
            .catch(()=>{
              Toast.fire({
                type: 'error',
                title: 'Whoops!',
                text: 'Something went wrong!'
              });
            });
        }

      }
    }
</script>