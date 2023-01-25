<template>
	<div class="password">
    <a href="#" @click="modalTrigger()">Change Password</a>
    <modal
      :title="'change Password'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-horizontal" @submit.prevent="changePassword" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">
            <div class="form-item">
              
              <!-- <div class="editor-head" v-if="error">
                <span class="help text-danger">
                   <strong style="color: red;" v-text="error"></strong>
                </span>
              </div> -->

             <!-- <div class="editor-head">
               <label for="password">Current Password</label>
               <div class="editor-input">
                 <input type="password" id="password" name="password" v-model="form.password"/>
               </div>


               <span class="help text-danger" v-if="form.errors.has('password')">
                   <strong style="color: red;" v-text="form.errors.get('password')"></strong>
               </span>
             </div> -->
              <div class="editor-head">
                <span class="form-note" style="color: #39c8df;">
                  Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
                </span>
              </div>
             <div class="editor-head">
               <label for="new_password">New Password</label>
               <div class="editor-input">
                 <input type="password" id="new_password" name="new_password" v-model="form.new_password"/>
               </div>


               <span class="help text-danger" v-if="form.errors.has('new_password')">
                   <strong style="color: red;" v-text="form.errors.get('new_password')"></strong>
               </span>
             </div>

             <div class="editor-head">
               <label for="new_password_confirmation">Confirm Password</label>
               <div class="editor-input">
                 <input type="password" id="new_password_confirmation" name="new_password_confirmation" v-model="form.new_password_confirmation"/>
               </div>


               <span class="help text-danger" v-if="form.errors.has('new_password_confirmation')">
                   <strong style="color: red;" v-text="form.errors.get('new_password_confirmation')"></strong>
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
          // error: '',
          form: new Form({
            // password:'',
            new_password: '',
            new_password_confirmation:''
          })
        }
      },

      methods: {
        modalTrigger() {
          this.showModal = true;
        },

        // clearError() {
        //   this.error = '';
        // },

        changePassword() {
          this.form.put('/api/teacher/change-password/')
            .then(response=>{
                Toast.fire({
                    type: 'success',
                    title: response.data.message
                });
                
                this.showModal = false;

              // console.log(response.data);
              // if (response.data.isvalid) {
              //   Toast.fire({
              //       type: 'success',
              //       title: response.data.message
              //   });
                
              //   this.showModal = false;
              // } else {
              //   this.error = 'Current password does not match!';
              //   Toast.fire({
              //     type: 'error',
              //     title: 'Whoops!',
              //     text: 'Current password does not match!'
              //   });
              // }
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