<template>
	<div class="followup">
    <div class="btn-edit -icon" @click="modalTrigger()">
        <i class="ico-edit"></i>
    </div>
    <modal
      :title="'Update Followup.'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-inner" @submit.prevent="updateFollowup()" @keydown="form.errors.clear($event.target.name)">
            <div class="form-item">
              <label for="question">Question</label>

              <div class="form-input">
                <input
                  type="text"
                  name="question"
                  value=""
                  placeholder="question"
                  v-model="form.question"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('question')">
                    <strong v-text="form.errors.get('question')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="queston_type">Question Type</label>

              <div class="form-input -select">
                  <select class="parent-id" name="code_id" id="code_id" v-model="form.code_id" @click="form.onKeydown($event)">
                    <option value="1" :selected="form.code_id == 1">True/False</option>
                    <option value="2" :selected="form.code_id == 2">Multiple Choice</option>
                    <option value="3" :selected="form.code_id == 3">Fill in the box</option>
                    <option value="4" :selected="form.code_id == 4">Select Option</option>
                    <option value="5" :selected="form.code_id == 5">Check Box</option>
                  </select>
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('queston_type')">
                    <strong v-text="form.errors.get('queston_type')"></strong>
                </span>
              </div>
            </div>
            
            <div class="form-btn">
              <button class="btn-update -withlabel" :disabled="form.errors.any()">
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
  import Modal from '../../../common/Modal';

    export default {

      props: ['followup'],

      components: {
        Modal
      },

      data () {
        return {
          showModal: false,
          form: new Form({
            id: '',
            question: '',
            question_id: '',
            code_id: ''
          })
        }
      },

      created() {
        
      },  

      methods: {
        modalTrigger() {
          this.showModal = true;
          this.form.fill(this.followup);
        },

        updateFollowup() {
          this.form.put('/api/admin/followup-question/'+this.form.id)
            .then(() => {
              this.showModal = false;
              Fire.$emit('loadQuestion');
              Fire.$emit('questionCodes');
              Toast.fire({
                type: 'success',
                title: 'Followup question updated!'
              });
            })
            .catch(() => {
              Toast.fire({
                  type: 'error',
                  title: 'Whoops! Something went wrong!'
                });
            });
        }
      }
    }
</script>