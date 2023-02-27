<template>
  <div class="product">
    <div class="btn-create -withlabel" style="margin-left:20px" @click="modalTrigger">
      <i class="ico-create"></i>
      <span>Create Conference</span>
    </div>
    <modal
      :title="'Create Conference'"
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
          <form class="form-horizontal" @submit.prevent="createConference" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">
          <div class="form-item">
            <label for="year">Year</label>

            <div class="form-input -select">
              <select class="custom-select" id="year" name="year" v-model="form.year">
                <option value="">Year:</option>
                <option v-for="year in years" :value="year"
                  :selected="year == form.year">
                {{ year }}
                </option>
              </select>
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('year')">
                  <strong v-text="form.errors.get('year')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
            <label for="name">Conference Name</label>

            <div class="form-input">
              <input
                v-model="form.name"
                type="text"
                name="name"
                value=""
                placeholder="Enter Conference Name"
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
          loading: true,
          years: [],
          form : new Form({
            id: '',
            year: '',
            name: '',
            location: '',
            link: ''
          })
        }
      },

      created () {
        this.loadYears(); // Load years
      },

      methods: {
        modalTrigger() {
          this.loading = true;
          this.showModal = true;
          this.loading = false;
        },

        createConference() {
          this.form.post('/api/academia/conferences')
            .then(()=>{
              location.reload();
              Toast.fire({
                  type: 'success',
                  title: 'Conference Created Successfully!'
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

        loadYears () {
          const year = new Date().getFullYear();
          this.years = Array.from({length: year - 2000}, (value, index) => 2001 + index);
        }

      }
    }
</script>