<template>
	<div class="choice">
    <div class="btn-create -withlabel" @click="modalTrigger()">
        <i class="ico-create"></i>
        <span>Add choices</span>
    </div>
    <modal
      :title="'Add Choices.'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-inner" @submit.prevent="createChoices()" @keydown="form.errors.clear($event.target.name)">
            <div class="form-item">
              <label for="label">Label</label>

              <div class="form-input">
                <input
                  type="text"
                  name="label"
                  value=""
                  placeholder="label"
                  v-model="form.label"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('label')">
                    <strong v-text="form.errors.get('label')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="points">Points</label>

              <div class="form-input">
                <input
                  type="text"
                  name="points"
                  value=""
                  placeholder="points"
                  v-model="form.points"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('points')">
                    <strong v-text="form.errors.get('points')"></strong>
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
            label: '',
            question_id: '',
            points: ''
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

        createChoices() {
          this.form.post('/api/admin/question-choices')
            .then(() => {
              this.showModal = false;
              Fire.$emit('loadQuestion');
              Fire.$emit('questionCodes');
              Toast.fire({
                type: 'success',
                title: 'Choice added!'
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