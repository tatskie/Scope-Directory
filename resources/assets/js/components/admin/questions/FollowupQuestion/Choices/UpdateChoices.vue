<template>
	<div class="choice">
    <div class="btn-edit -icon" @click="modalTrigger()">
        <i class="ico-edit"></i>
    </div>
    <modal
      :title="'Update Choices.'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-inner" @submit.prevent="updateChoices()" @keydown="form.errors.clear($event.target.name)">
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

      props: ['choice'],

      components: {
        Modal
      },

      data () {
        return {
          showModal: false,
          form: new Form({
            id: '',
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
          this.form.fill(this.choice);
        },

        updateChoices() {
          this.form.put('/api/admin/question-choices/'+this.form.id)
            .then(() => {
              this.showModal = false;
              Fire.$emit('loadQuestion');
              Fire.$emit('questionCodes');
              Toast.fire({
                type: 'success',
                title: 'Choice updated!'
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