<template>
  <div class="questionaire">
    <div class="contents-head">
      <h2><span style="margin-right:20px">Questionnaire</span></h2>
      
      <div class="btn-create -withlabel" @click="modalTrigger('create')">
        <i class="ico-create"></i>
        <span>Create</span>
      </div>   
      <div class="btn-update -withlabel">
        <router-link to="/admin/tif-questions" style="color: white;">
          <span>TIF Questions</span>
        </router-link>
      </div>
      <div class="form-item">
        <div class="form-input -select">
          <select class="parent-id" name="roles" @change="filterQuestion($event)">
            <option value="all">All</option>
            <option value="teacher">Teacher</option>
            <option value="academia">Academia</option>
            <option value="undergrad">Undergrad</option>
          </select>
        </div>
      </div>  
    </div>

    <div class="contents-body" v-if="loading">
      <div class="emptylist">
        <img src="/assets/assets/images/loading/loading.gif">
      </div>
    </div>

    <div class="contents-body" v-else>
      <div class="emptylist" v-if="questions.length == 0">
        <i class="ico-empty-folder"></i>
      </div>

      <tbl v-else>
        <template slot="head">
          <tbl-td class="number">
            order
          </tbl-td>

          <tbl-td class="question" style="width:50%;">
            question
          </tbl-td>

          <tbl-td class="points">
            points
          </tbl-td>

          <tbl-td class="actions">

          </tbl-td>
        </template>

        <template slot="body">
          <tbl-row v-for="(question, ruleID) in questions" :key="question.id">
            <tbl-td class="number">
              {{ ruleID + 1 }}
            </tbl-td>

            <tbl-td class="question">
              {{ question.question | upText}}
            </tbl-td>

            <tbl-td class="points">
              {{ question.points }}
            </tbl-td>

            <tbl-td class="actions">
              <div class="btn-edit -icon" @click="editQuestion(question)">
                <i class="ico-edit"></i>
              </div>
              <div class="btn-delete -icon" @click="deleteQuestion(question.id)">
                <i class="ico-delete"></i>
              </div>
            </tbl-td>
          </tbl-row>
        </template>

        <template slot="footer">

        </template>
      </tbl>

    </div>

    <modal
      :title="'Add New Question'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-inner" @submit.prevent="createQuestion()" @keydown="form.errors.clear($event.target.name)">

            <div class="form-item">
              <label for="question">Question</label>

              <div class="form-textarea">
                <textarea
                  id="question"
                  name="question"
                  v-model="form.question"
                  placeholder="Question here..."
                >
                </textarea>
              </div>

              <div class="form-error">
                <span v-if="form.errors.has('question')">
                    <strong v-text="form.errors.get('question')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="code_id">Question Type</label>
              <div class="form-input -select">
                  <select class="parent-id" name="code_id" id="code_id" v-model="form.code_id" @click="form.onKeydown($event)">
                    <option value="1">True/False</option>
                    <option value="2">Multiple Choice</option>
                    <option value="3">Fill in the box</option>
                    <option value="4">Select Option</option>
                    <option value="5">Check Box</option>
                  </select>
              </div>
              <br>
              <div class="form-error">
                <span v-if="form.errors.has('code_id')">
                    <strong v-text="form.errors.get('code_id')"></strong>
                </span>
              </div>
            </div>

            <div class="form-extra">
              <div class="form-check">
                  <input class="form-check" type="checkbox" name="impact_factor" id="impact_factor" value="1" v-model="form.impact_factor">
                  <label for="impact_factor">Impact Factor</label>
              </div>
              <br>
              <div class="form-error">
                <span v-if="form.errors.has('impact_factor')">
                    <strong v-text="form.errors.get('impact_factor')"></strong>
                </span>
              </div>
            </div>

            <div class="form-btn">
              <button class="btn-create -withlabel" :disabled="form.errors.any()">
                <i class="ico-create"></i>
                <span>Create</span>
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
  name: 'questionaire',

  components: {
    // "modal-question": QuestionModal,
    Modal
  },

  data () {
    return {
      showModal: false,
      requestType: '',
      questions : {},
      loading: true,
      form: new Form({
          id: '',
          question: '',
          number: '',
          impact_factor: false,
          code_id: ''
      })
    }
  },

  created () {
    this.loadQuestions();

    Fire.$on('loadQuestion',() =>{
          this.loadQuestions();
    });

    Fire.$on('createQuestion',() =>{
          this.form.reset();
    });

    Fire.$on('loadTeacherQuestions',() =>{
          this.loadTeacherQuestions();
    });

    Fire.$on('loadAcademiaQuestions',() =>{
          this.loadAcademiaQuestions();
    });

    Fire.$on('loadUndergradQuestions',() =>{
          this.loadUndergradQuestions();
    });
  },

  methods: {
    modalTrigger() {
      this.showModal = true
      this.form.reset();
      Fire.$emit('createQuestion');
      axios.get('/api/admin/questions').then(({data}) => (this.form.number = data.data.length + 1));
    },

    editQuestion(question) {
      this.$router.push('/admin/questions/'+question.id);
    },

    loadQuestions() {
        this.loading = true
        axios.get('/api/admin/questions').then(({data}) => (
          this.questions = data.data,
          this.loading = false
        ));
    },

    loadTeacherQuestions() {
        this.loading = true
        axios.get('/api/admin/questions-teacher').then(({data}) => (
          this.questions = data.data,
          this.loading = false
        ));
    },

    loadAcademiaQuestions() {
        this.loading = true
        axios.get('/api/admin/questions-academia').then(({data}) => (
          this.questions = data.data,
          this.loading = false
        ));
    },

    loadUndergradQuestions() {
        this.loading = true
        axios.get('/api/admin/questions-undergrad').then(({data}) => (
          this.questions = data.data,
          this.loading = false
        ));
    },
    
    deleteQuestion(id) {
        swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            this.form.delete('/api/admin/questions/'+ id).then(data => {
                Fire.$emit('loadQuestion');
                swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
            }).catch(() => {
                swal.fire(
                  'Failed!!',
                  'Something went wrong.',
                  'warning'
                )
            });
          }
        })
    },

    // codeID() {
    //   this.form.errors.clear();
    // },

    createQuestion() {
        this.form.post('/api/admin/questions')
            .then(response => {
                this.showModal = false;

                Toast.fire({
                  type: 'success',
                  title: 'Question created successfully'
                });
                this.$router.push('/admin/questions/'+response.data.id);
            })
            .catch(() => {
              Toast.fire({
                type: 'error',
                title: 'Whoops! Something went wrong!'
              });
            });
    },

    clearData() {
        this.showModal = false;
        this.form.reset();
    },

    filterQuestion(event) {
      if(event.target.value == 'all') {
        this.form.role = 'all';
        this.role = 'all';
        Fire.$emit('loadQuestion');
      }

      if(event.target.value == 'teacher') {
        this.form.role = 'teacher';
        this.role = 'teacher';
        Fire.$emit('loadTeacherQuestions');
      }

      if(event.target.value == 'academia') {
        this.form.role = 'academia';
        this.role = 'academia';
        Fire.$emit('loadAcademiaQuestions');
      }

      if(event.target.value == 'undergrad') {
        this.form.role = 'undergrad';
        this.role = 'undergrad';
        Fire.$emit('loadUndergradQuestions');
      }
    }
  }
}
</script>
