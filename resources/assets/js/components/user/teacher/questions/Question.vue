<template>
	<div class="questionaire">
    <div class="contents-head">
      <h2>Welcome to Question</h2>
    </div>

    <div class="contents-body">
      <div class="emptylist" v-if="questions.length == 0">
        <i class="ico-empty-folder"></i>
      </div>

      <tbl v-else>
        <template slot="head">
          <tbl-td class="number">
            order
          </tbl-td>

          <tbl-td class="question">
            question
          </tbl-td>

          <tbl-td class="answer">
            Answer
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
              {{ question.question.question }}
            </tbl-td>

            <tbl-td class="answer" v-if="question.is_yes">
              Yes
            </tbl-td>

            <tbl-td class="answer" v-else>
              No
            </tbl-td>

            <tbl-td class="actions">
              <div class="btn-edit -icon" @click="modalTrigger(question.question, ruleID + 1)">
                Update Answer
              </div>
            </tbl-td>
          </tbl-row>
        </template>

        <template slot="footer">

        </template>
      </tbl>

    </div>

  

  <modal
      :title="'Update Answer'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-inner" @submit.prevent="updateAnswer()" @keydown="form.errors.clear($event.target.name)">

            <div class="form-check">
              <label for="question">{{ number }}. {{ questionaire.question }}</label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" value="1" name="is_yes" id="is_yes"
                  v-model="form.is_yes" @click="yesAnswer">
              <label class="form-check-label" for="is_yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="0" name="is_yes" id="is_no"
                  v-model="form.is_yes" @click="noAnswer">
              <label class="form-check-label" for="is_no">
                No
              </label>
            </div>
            <div class="form-error">
              <span v-if="form.errors.has('is_yes')">
                  <strong v-text="form.errors.get('is_yes')"></strong>
              </span>
            </div>

            <div class="form-item" v-if="form.is_yes == 1 && followupQuestionaire">

                <br>
                <label for="answer">Follow up Question</label>
                <br>
                <p>{{ followupQuestionaire.question }}</p>
                <div class="form-input" v-if="followupQuestionaire.type == 'select'">
                  <select name="answer" v-model="form.answer" @change="clearErrors">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10+</option>
                  </select>
                </div>
                <div class="form-input" v-else>
                  <input
                    :type="followupQuestionaire.type"
                    name="answer"
                    v-model="form.answer"
                    :placeholder="followupQuestionaire.question"
                    id="answer"
                    @keydown="clearErrors"
                  />
                </div>
                <div class="form-error">
                  <span v-if="form.errors.has('answer')">
                      <strong v-text="form.errors.get('answer')"></strong>
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
          questions : {},
          questionaire : {},
          number: '',
          followupQuestionaire : {},
          // form: new Form()
          form: new Form({
              is_yes: '',
              answer: ''
          })
        }
      },

      created () {
        this.loadQuestions(); // Load the data in question
      },

      methods: {
        loadQuestions() {
            axios.get('/api/teacher/questions').then(({data}) => (this.questions = data));
        },

        modalTrigger(question, number) {
          this.showModal = true
          this.questionaire = question
          this.number = number
          axios.get('/api/teacher/questions/'+question.id)
              .then(({data}) => (
                this.form.is_yes = data.answer ? data.answer.is_yes : '', 
                this.followupQuestionaire = data.followupQuestion ? data.followupQuestion : '',
                this.form.answer = data.followupAnswer ? data.followupAnswer.answer : ''
              ));
        },

        updateAnswer() {
            this.form.put('/api/teacher/questions/'+this.questionaire.id)
            .then(() => {
                this.loadQuestions(); // Load the data in question
                this.showModal = false;

                Toast.fire({
                  type: 'success',
                  title: 'Update answer successfully'
                });
            })
            .catch(() => {
                this.$Progress.fail();
            });
            
        },

        noAnswer() {
          this.form.errors.clear();
          this.form.answer = '';
        },

        yesAnswer() {
          this.form.errors.clear();
          axios.get('/api/teacher/questions/'+this.questionaire.id)
              .then(({data}) => (
                this.followupQuestionaire = data.followupQuestion ? data.followupQuestion : '',
                this.form.answer = data.followupAnswer ? data.followupAnswer.answer : ''
              ));
        },

        clearErrors() {
          this.form.errors.clear();
        }

      }
        
    }
</script>
