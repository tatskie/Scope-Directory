<template>
  <div class="product">
    <div class="btn-edit -icon" @click="modalTrigger()">
      <i class="ico-edit"></i>
    </div>
    <modal
      :title="'Edit Publication'"
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
          <form class="form-horizontal" @submit.prevent="updatePublication" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">
          <div class="form-item">
            <label for="year">Year</label>

            <div class="form-input -select">
              <select class="custom-select" id="year" name="year" v-model="form.year">
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
            <label for="title">Title</label>

            <div class="form-input">
              <input
                v-model="form.title"
                type="text"
                name="title"
                value=""
                placeholder="Enter Title"
                id="title"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('title')">
                  <strong v-text="form.errors.get('title')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
            <label for="journal">Journal</label>

            <div class="form-input">
              <input
                v-model="form.journal"
                type="text"
                name="journal"
                value=""
                placeholder="Enter Journal"
                id="journal"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('journal')">
                  <strong v-text="form.errors.get('journal')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
            <label for="doi">DOI</label>

            <div class="form-input">
              <input
                v-model="form.doi"
                type="text"
                name="doi"
                value=""
                placeholder="Enter DOI"
                id="doi"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('doi')">
                  <strong v-text="form.errors.get('doi')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
            <label for="source">Source</label>

            <div class="form-input">
              <input
                v-model="form.source"
                type="text"
                name="source"
                value=""
                placeholder="Enter Source"
                id="source"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('source')">
                  <strong v-text="form.errors.get('source')"></strong>
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
      props: ['publication'],

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
            title: '',
            journal: '',
            doi: '',
            source: ''
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
          this.form.fill(this.publication);
          this.loading = false;
        },

        updatePublication() {
          this.form.put('/api/academia/publications/'+this.form.id)
            .then(()=>{
              location.reload();
              Toast.fire({
                  type: 'success',
                  title: 'Publication Updated Successfully!'
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