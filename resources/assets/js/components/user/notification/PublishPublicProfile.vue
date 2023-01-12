<template>
  <div class="product">
    <div class="btn-warning -withlabel" @click="modalTrigger()">
      Next - Setup your Public Profile&nbsp;<i class="fa fa-user-circle" style="font-size:16px;color:#fff"></i>
    </div>
    <modal
      :title="'Setup your Public Profile'"
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
          <form class="form-horizontal" @submit.prevent="publishProfile" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">
          <div class="form-item">
            <label for="employer">Employer’s name</label>

            <div class="form-input">
              <input
                v-model="form.employer"
                type="text"
                name="employer"
                value=""
                placeholder="Employer’s name"
                id="employer"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('employer')">
                  <strong v-text="form.errors.get('employer')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
              
              <input
                v-model="form.is_present"
                type="checkbox"
                name="is_present"
                value=""
                id="is_present"
                @change="isPresent($event)"
              />
              I currently work here
          </div>

          <div class="form-item">
            <label for="from">From</label>

            <div class="form-input">
              <input
                v-model="form.from"
                type="date"
                name="from"
                value=""
                placeholder="from"
                id="from"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('from')">
                  <strong v-text="form.errors.get('from')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item" v-if="!form.is_present">
            <label for="to">To</label>

            <div class="form-input">
              <input
                v-model="form.to"
                type="date"
                name="to"
                value=""
                placeholder="To"
                id="to"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('to')">
                  <strong v-text="form.errors.get('to')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
            <label for="bio">Bio</label>

            <div class="form-textarea">
              <textarea
                v-model="form.bio"
                name="bio"
                value=""
                placeholder="Enter Bio"
                id="bio"
              />
              </textarea>
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('bio')">
                  <strong v-text="form.errors.get('bio')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
            <label for="index">Google Scholar H Index</label>

            <div class="form-input">
              <input
                v-model="form.index"
                type="text"
                name="index"
                value=""
                placeholder="Google Scholar H index"
                id="index"
              />
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('index')">
                  <strong v-text="form.errors.get('index')"></strong>
              </span>
            </div>
          </div>

          <div class="form-item">
            <label for="additional_information">Additional Information</label>

            <div class="form-textarea">
              <textarea
                v-model="form.additional_information"
                type="textarea"
                name="additional_information"
                value=""
                placeholder="500 characters."
                id="additional_information"
              />
              </textarea>
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('additional_information')">
                  <strong v-text="form.errors.get('additional_information')"></strong>
              </span>
            </div>
          </div>

          <div class="form-btn">
            <button class="btn-update -withlabel">
              <i class="ico-update"></i>
              <span>Publish</span>
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
          form : new Form({
            employer: '',
            is_present: false,
            from: '',
            to: '',
            bio: '',
            index: '',
            additional_information: ''
          })
        }
      },

      created () {
        
      },

      methods: {
        modalTrigger() {
          this.showModal = true;
          this.loading = false;
        },

        isPresent(e) {
          if (e.target.checked) {
            this.form.is_present = true;
            this.form.to = '';
          } else {
            this.form.is_present = false;
          }
        },

        publishProfile() {
          this.form.post('/api/academia/informations')
            .then(()=>{
              Toast.fire({
                  type: 'success',
                  title: 'Public Profile Published Successfully!'
              });
              
              this.showModal = false;
              location.reload();
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