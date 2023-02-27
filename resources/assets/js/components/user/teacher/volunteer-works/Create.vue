<template>
  <div class="product">
    <div class="btn-create -withlabel" style="margin-left:20px" @click="modalTrigger">
      <i class="ico-create"></i>
      <span>Create Volunteer Work</span>
    </div>
    <modal
      :title="'Create Volunteer Work'"
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
          <form class="form-horizontal" @submit.prevent="createVolunteer" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">

          <div class="form-item">
            <label for="volunteer_work">Volunteer Work</label>

            <div class="editor-body">
              <!-- <input
                v-model="form.volunteer_work"
                type="text"
                name="volunteer_work"
                value=""
                placeholder="Enter Volunteer Work"
                id="volunteer_work"
              /> -->
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
              <span>Save</span>
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
      components: {
        // "modal-question": QuestionModal,
        Modal
      },

      data () {
        return {
          showModal: false,
          loading: true,
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
          this.loading = false;
        },

        createVolunteer() {
          this.form.post('/api/teacher/volunteer')
            .then(()=>{
              location.reload();
              Toast.fire({
                  type: 'success',
                  title: 'Volunteer Work Created Successfully!'
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