<template>
  <div class="video">
    <div class="btn-edit -icon" @click="modalTrigger()">
      <i class="ico-edit"></i>
    </div>
    <modal
      :title="'Edit Video'"
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
          <form class="form-horizontal" @submit.prevent="updateVideo" @keydown="form.errors.clear($event.target.name)" enctype="multipart/form-data">

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
      props: ['video'],

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
            title: '',
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
          this.form.fill(this.video);
          this.loading = false;
        },

        updateVideo() {
          this.form.put('/api/academia/videos/'+this.form.id)
            .then(()=>{
              location.reload();
              Toast.fire({
                  type: 'success',
                  title: 'Video Updated Successfully!'
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