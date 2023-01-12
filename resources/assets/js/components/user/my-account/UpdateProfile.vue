<template>
	<div class="product">

    <div class="form-btn" @click="modalTrigger()">
      <button class="btn-update -withlabel">
        <i class="ico-update"></i>
        <span>Update Info</span>
      </button>
    </div>
    <modal
      :title="'Update Profile'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-horizontal" @submit.prevent="updateProfile" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">
            <div class="form-item">
              <div class="editor-head">
               <label for="name">Name</label>
               <div class="editor-input">
                 <input type="text" id="name" name="name" v-model="form.name"/>
               </div>


               <span class="help text-danger" v-if="form.errors.has('name')">
                   <strong v-text="form.errors.get('name')"></strong>
               </span>
             </div>

             <div class="editor-head">
               <label for="email">Email Address</label>
               <div class="editor-input">
                 <input type="text" id="email" name="email" v-model="form.email"/>
               </div>


               <span class="help text-danger" v-if="form.errors.has('email')">
                   <strong v-text="form.errors.get('email')"></strong>
               </span>
             </div>

             <div class="editor-head">
               <label for="username">Username</label>
               <div class="editor-input">
                 <input type="text" id="username" name="username" v-model="form.username"/>
               </div>


               <span class="help text-danger" v-if="form.errors.has('username')">
                   <strong v-text="form.errors.get('username')"></strong>
               </span>
             </div>

             <div class="editor-head">
               <label for="title">Title</label>
               <div class="editor-input">
                 <input type="text" id="title" name="title" v-model="form.title"/>
               </div>


               <span class="help text-danger" v-if="form.errors.has('title')">
                   <strong v-text="form.errors.get('title')"></strong>
               </span>
             </div>

             <div class="form-item">
               <label for="citizenship">Citizenship</label>
               <div class="form-input -select">
                 <select class="custom-select" id="citizenship" name="citizenship" v-model="form.citizenship">
                   <option v-for="country in countries"
                      :value="country.nationality"
                      :selected="country.nationality == form.citizenship">
                    {{ country.nationality | upText }}
                  </option>
                 </select>
               </div>


               <span class="help text-danger" v-if="form.errors.has('citizenship')">
                   <strong v-text="form.errors.get('citizenship')"></strong>
               </span>
             </div>


             <div class="editor-head">
               <label for="gender">Gender</label>
               <div class="form-input -select">
                  <select class="custom-select" id="gender" name="gender" v-model="form.gender">
                     <option v-for="gen in gender"
                        :value="gen.list"
                        :selected="gen.list == form.gender">
                      {{ gen.list }}
                    </option>
                  </select>
               </div>


               <span class="help text-danger" v-if="form.errors.has('gender')">
                   <strong v-text="form.errors.get('gender')"></strong>
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
          countries: [],
          gender: [
            { 'list': 'Male' },
            { 'list': 'Female' }
          ],
          form: new Form({
            name:'',
            email:'',
            username:'',
            citizenship: '',
            title: '',
            gender: ''
          })
        }
      },

      created () {
        this.loadProfile(); // Load photo
      },

      methods: {
        modalTrigger() {
          axios.get('/api/academia/profile').then(({data}) => (
            this.form.citizenship = data.card.citizenship,
            this.form.title = data.card.title,
            this.form.date_of_birth = data.card.date_of_birth,
            this.form.gender = data.card.gender
            ));

          axios.get('/api/academia/countries').then(({data}) => (
            this.countries = data
            ));

          this.showModal = true;
        },

        loadProfile() {
            axios.get('/api/academia/profile').then(({data}) => (this.form.fill(data)));
        },

        updateProfile() {
          this.form.put('/api/academia/profile/')
            .then(()=>{
              Fire.$emit('loadProfile');

              Toast.fire({
                  type: 'success',
                  title: 'Profile Updated Successfully!'
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