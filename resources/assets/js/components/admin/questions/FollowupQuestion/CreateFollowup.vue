<template>
	<div class="followup">
    <div class="btn-create -withlabel" @click="modalTrigger()">
        <i class="ico-create"></i>
        <span>Add Followup Question</span>
    </div>
    <modal
      :title="'Add Followup Question.'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-inner" @submit.prevent="createFollowup()" @keydown="form.errors.clear($event.target.name)">
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
                  <select class="parent-id" name="question_type" id="question_type" v-model="form.question_type" @click="form.onKeydown($event)">
                    <option value="1">True/False</option>
                    <option value="2">Multiple Choice</option>
                    <option value="3">Fill in the box</option>
                    <option value="4">Select Option</option>
                    <option value="5">Check Box</option>
                  </select>
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('queston_type')">
                    <strong v-text="form.errors.get('queston_type')"></strong>
                </span>
              </div>
            </div>
            
            <div class="form-btn">
              <button class="btn-create -withlabel" :disabled="form.errors.any()">
                <i class="ico-create"></i>
                <span>Create</span>
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

      props: ['question'],

      components: {
        Modal
      },

      data () {
        return {
          showModal: false,
          form: new Form({
            question: '',
            question_id: '',
            question_type: ''
          })
        }
      },

      created() {
        
      },  

      methods: {
        modalTrigger() {
          this.showModal = true;
          this.form.reset();
          this.form.question_id = this.question.id;
        },

        createFollowup() {
          this.form.post('/api/admin/followup-question')
            .then(() => {
              this.showModal = false;
              Fire.$emit('loadQuestion');
              Fire.$emit('questionCodes');
              Toast.fire({
                type: 'success',
                title: 'Followup Question Added!'
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