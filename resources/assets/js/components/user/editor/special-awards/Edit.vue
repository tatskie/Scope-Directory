<template>
  <div class="product">
    <div class="btn-edit -icon" @click="modalTrigger()">
      <i class="ico-edit"></i>
    </div>
    <modal
      :title="'Edit Special Award'"
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
          <form class="form-horizontal" @submit.prevent="updateSpecialAward" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">

          <div class="form-item">
            <label for="name">Name</label>

            <div class="form-input">
              <input
                v-model="form.name"
                type="text"
                name="name"
                value=""
                placeholder="Enter Name"
                id="name"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('name')">
                  <strong v-text="form.errors.get('name')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
            <label for="location">Location</label>

            <div class="form-input">
              <input
                v-model="form.location"
                type="text"
                name="location"
                value=""
                placeholder="Enter Location"
                id="location"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('location')">
                  <strong v-text="form.errors.get('location')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
            <label for="link">Link</label>

            <div class="form-input">
              <input
                v-model="form.link"
                type="text"
                name="link"
                value=""
                placeholder="Enter Link"
                id="link"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('link')">
                  <strong v-text="form.errors.get('link')"></strong>
              </span>
            </div>
          </div>

          <div class="form-btn">
            <button class="btn-update -withlabel">
              <i class="ico-update"></i>
              <span>update</span>
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

    export default {
      props: ['award'],

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
            name: '',
            location: '',
            link: ''
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
          this.form.fill(this.award);
          this.loading = false;
        },

        updateSpecialAward() {
          this.form.put('/api/teacher/awards/'+this.form.id)
            .then(()=>{
              location.reload();
              Toast.fire({
                  type: 'success',
                  title: 'Special Award Updated Successfully!'
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