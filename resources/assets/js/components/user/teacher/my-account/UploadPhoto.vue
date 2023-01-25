<template>
	<div class="product">

    <div class="form-btn" @click="modalTrigger()">
      <button class="btn-create -withlabel">
        <i class="ico-update"></i>
        <span>Update Photo</span>
      </button>
    </div>
    <modal
      :title="'Update Photo'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-horizontal" @submit.prevent="updateProfilePhoto" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">
            <div class="form-item">
                <span>
                    <strong>File format: JPG or PNG, not more than 2MB in file size.</strong>
                </span>
            </div>
            <div class="form-item">
              <div class="form-input">
                <input type="file" @change="updateProfile" name="photo" class="btn-create -withlabel" placeholder="Upload Photo">
              </div>

              <div class="form-error">
                <span v-if="form.errors.has('photo')">
                    <strong v-text="form.errors.get('photo')"></strong>
                </span>
              </div>
            </div>
            <div class="form-btn">
              <button class="btn-update -withlabel" :disabled="form.errors.any()">
                <i class="ico-update"></i>
                <span>Upload</span>
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
      components: {
        // "modal-question": QuestionModal,
        Modal
      },

      data () {
        return {
          showModal: false,
          form: new Form({
            photo: '',
          })
        }
      },

      created () {
        this.loadPhoto(); // Load photo
      },

      methods: {
        modalTrigger() {
          this.showModal = true;
        },

        loadPhoto() {
            axios.get('/api/teacher/profile').then(({data}) => (this.form.photo = data.card.photo));
        },

        updateProfilePhoto() {
          this.form.put('/api/teacher/photo/')
            .then(()=>{
              Fire.$emit('loadProfile');
              Toast.fire({
                  type: 'success',
                  title: 'Photo Updated Successfully!'
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
        },

        updateProfile(e) {

          this.form.errors.clear();
          // console.log('uploading');
          let file = e.target.files[0];
          // console.log(file);
          let reader = new FileReader();

          if (file['size'] < 2111775) {
            reader.onloadend = (file) => {
              this.form.photo = reader.result;
            }
            reader.readAsDataURL(file);
          }else {
            Toast.fire({
              type: 'error',
              title: 'Whoops!',
              text: 'You are uploading a large file!'
            });
          }
        }
      }
    }
</script>