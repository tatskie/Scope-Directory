<template>
	<div class="product">

    <div class="form-btn" @click="modalTrigger()">
      <button class="btn-create -withlabel">
        <span>View formatted CV</span>
      </button>
    </div>
    <modal
      :title="'Updated CV'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
         <br>
          <div class="card" style="text-align: center;">
            <img :src="'/assets/assets/images/user/'+user.card.photo" alt="Avatar" class="profile" width="300">
            <div class="container">
              <h4><b>{{ user.card.title }} {{ user.name }}</b></h4> 
              <h4>Professional Status: <small>L{{ category.number }} - {{ category.specialist_title }}</small></h4> 
              <h4>TIF Level: <small>{{ tif.title }}</small></h4> 
              <p>Gender: {{ user.card.gender }}</p> 
              <p>Citizenship: {{ user.card.citizenship }}</p> 
              <p>Email: {{ user.email }}</p> 
              <br>
            </div>
          </div>
          <!-- <div class="form-btn" @click="downloadPDF()">
            <button class="btn-create -withlabel">
              <i class="ico-eye"></i>
              <span>Download as PDF</span>
            </button>
          </div> -->
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
          user : [],
          tif : [],
          category: {
            specialist_title: '',
            class: ''
          }
        }
      },

      created () {
        this.loadPhoto(); // Load photo

        this.loadLicenseCategory(); // Load the user license category

        this.loadTIF(); // Load the user license category
      },

      methods: {
        modalTrigger() {
          this.showModal = true;
        },

        loadPhoto() {
            axios.get('/api/academia/profile').then(({data}) => (this.user = data));
        },

        loadLicenseCategory() {
            axios.get('/api/academia/license-cateogry').then(({data}) => (this.category = data));
        },

        loadTIF() {
            axios.get('/api/academia/tif-level').then(({data}) => (this.tif = data));
        },

        downloadPDF() {
          axios({
            url: '/api/academia/pdf',
            method: 'GET',
            responseType: 'blob', // important
          }).then((response) => {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'cv.pdf');
            document.body.appendChild(link);
            link.click();
          });
          // axios.get('/api/teacher/pdf').then(({data}) => (console.log(data)));
        }
      }
    }
</script>