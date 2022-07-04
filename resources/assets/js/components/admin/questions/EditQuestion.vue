<template>
    <div class="questionaire">
    	<div class="contents-head" v-if="loading" style="text-align: center;">
	        <img src="/assets/assets/images/loading/loading.gif" width="65px" height="60px">
	    </div>
	    <div class="contents-head" v-else>
	      <h2>{{ number }}. {{ question.question }}</h2> 
	    </div>

		<div class="editor">
			<div class="editor-content" v-if="loadingChoices">
		      	<div class="emptylist">
			        <img src="/assets/assets/images/loading/loading.gif">
			    </div>
		    </div>
		    <div class="editor-content" v-else>
		    	<div v-if="followup.length == 0">
		    		<br>
		    	</div>
		    	<div v-else>
			    	<h1>Followup Question</h1>
			    	<br>
			      	 <table>
					  <tr>
					    <th>Questions</th>
					    <th>Question Type</th>
					    <th>Choices</th>
					  	<th></th>
					  	<th></th>
					  </tr>
					  <tr v-for="(followupQuestion, ruleID) in followup" :key="followupQuestion.id">
					    <td>{{ followupQuestion.question }}</td>
					    <td>{{ followupQuestion.code.type_of_choices }}</td>
				        <td>
					    	<followup-choices :followup="followupQuestion"></followup-choices>
				        </td>
					    <td>
					    	<update-followup :followup="followupQuestion"></update-followup>
				        </td>
				        <td>
				            <delete-followup :followup="followupQuestion"></delete-followup>
	          			</td>
					  </tr>
					</table>
					<br>
				</div>
				<div v-if="choices.length == 0">

		    	</div>
		    	<div v-else>
					<h1>Choices</h1>
			    	<br>
			      	 <table>
					  <tr>
					    <th>Label</th>
					    <th>Points</th>
					  	<th></th>
					  	<th></th>
					  </tr>
					  <tr v-for="(choice, ruleID) in choices" :key="choice.id">
					    <td>{{ choice.label }}</td>
					    <td>{{ choice.points }}</td>
					    <td>
					    	<update-choices :choice="choice"></update-choices>
				        </td>
				        <td>
				        	<delete-choices :choice="choice"></delete-choices>
	          			</td>
					  </tr>
					</table>
				</div>
		    </div>

		<div class="editor-sidebar" v-if="loading">
			<img src="/assets/assets/images/loading/loading.gif" width="250px" height="200px">
		</div>

	    <div class="editor-sidebar" v-else>
	      <div class="editor-box">
	        <div class="editor-title">
	          <h3>Question Details</h3>
	        </div>

	        <div class="editor-box-inner">
	          <!-- <div class="form-check" v-if="filterQuestion.length != 0">
	          		<div class="editor-box-input">
			            <select class="parent-id" name="account_type" @change="accountType($event)">
			              	<option value="teacher" :selected="filterQuestion[0].roles == 'teacher'">Teacher</option>
			                <option value="academia" :selected="filterQuestion[0].roles == 'academia'">Academia</option>
			                <option value="undergrad" :selected="filterQuestion[0].roles == 'undergrad'">Undergrad</option>
			            </select>
		        	</div>
	           </div>
	           <div class="editor-box-inner" v-else>
	            <label for="parent-id">Select account type</label>
	            <div class="editor-box-input">
		            <select class="parent-id" name="account_type" @change="accountType($event)">
		            	<option value=""></option>
		              	<option value="teacher">Teacher</option>
		                <option value="academia">Academia</option>
		                <option value="undergrad">Undergrad</option>
		            </select>
	        	</div>
	          </div> -->

	           <div class="editor-box-item">
	           	<!-- <br> -->
	            <label for="parent-id">Impact Factor</label>
	          </div>
	          <div class="form-check">
	              <input class="form-check" name="is_yes" :value="question.impact_factor" id="is_yes" type="checkbox" :checked="question.impact_factor" @change="impactFactor($event)">
	              <label for="is_yes">Yes</label>
	              <br>
	           </div>

	          <div class="editor-box-item">
	          	<br>
	            <label for="subpage-order">Question Type</label>

	            <div class="editor-box-input">
	              	<div class="editor-box-input">
			            <select class="parent-id" name="code_id" @change="questionType($event)">
			            	<option v-for="questionCode in codes" :value="questionCode.id" :selected="questionCode.id == code.id">{{ questionCode.type_of_choices }}</option>
			            </select>
		        	</div>
	            </div>
	          </div>

	          <!-- <div class="editor-box-item" v-show="code.id == 3">
	          	<br>
	            <label for="subpage-order">Points</label>

	            <div class="editor-box-input">
	              	<div class="editor-box-input">
		              <input type="text" name="subpage-order" value="" placeholder="0">
		            </div>
	            </div>
	          </div> -->

	          <div class="editor-box-item">
	          	<br>
	            <div class="btn-update -withlabel" @click="editQuestion()">
			        <i class="ico-update"></i>
			        <span>Edit Question</span>
			    </div>
			    <br>
			    <create-choices :question="question"></create-choices>
			    <br>
			    <create-followup v-if="followup.length == 0" :question="question"></create-followup>
			    <br v-if="followup.length == 0">
			    <div class="btn-delete -withlabel" @click="deleteQuestion(form.id)">
			        <i class="ico-delete"></i>
			        <span>Delete Question</span>
			    </div>
	          </div>
	        </div>

	      </div>
	    </div>
	  </div>
	  <modal
	      :title="'edit Question'"
	      class=" modal-questionaire"
	      v-if="showModal"
	      :activate="showModal"
	      @activate="showModal = $event"
	    >
	      <template slot="body">
	        <div class="form">
	          <form class="form-inner" @submit.prevent="updateQuestion()" @keydown="form.errors.clear($event.target.name)">
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
import '../../common/table/Table'
import Modal from '../../common/Modal'
import CreateChoices from './Choices/CreateChoices'
import UpdateChoices from './Choices/UpdateChoices'
import DeleteChoices from './Choices/DeleteChoices'
import CreateFollowup from './FollowupQuestion/CreateFollowup'
import UpdateFollowup from './FollowupQuestion/UpdateFollowup'
import DeleteFollowup from './FollowupQuestion/DeleteFollowup'
import FollowupChoices from './FollowupQuestion/Choices/FollowupChoices'

    export default {
    	name: 'questionEdit',
    	components: {
		    Modal,
		    'create-choices': CreateChoices,
		    'update-choices': UpdateChoices,
		    'delete-choices': DeleteChoices,
		    'create-followup': CreateFollowup,
		    'update-followup': UpdateFollowup,
		    'delete-followup': DeleteFollowup,
		    'followup-choices': FollowupChoices,
		},	

    	data () {
		    return {
		      loading: true,
		      loadingChoices: true,
		      followup: [],
		      choices: [],
		      codes: [],
		      code: [],
		      filterQuestion: [],
		      showModal: false,
		      question: {},
		      number: '',
		      form: new Form({
	               id: '',
	               question: '',
		           impact_factor: false,
		           code_id: '',
		           account_type: ''
	           })
		    }
		},

		created () {
		    this.loadQuestion();

		    this.questionCodes();

		    Fire.$on('loadQuestion',() =>{
		          this.loadQuestion();
		    });

		    Fire.$on('questionCodes',() =>{
		          this.questionCodes();
		    });
		},

        methods: {
        	loadQuestion() {
        		 axios.get('/api/admin/questions/'+this.$route.params.id).then(response => {
	                this.form.fill(response.data);
	                this.question = response.data;

	                if (response.data.followup_question.length != 0) {
	                	this.followup = response.data.followup_question;
	                }

	                if (response.data.question_choices.length != 0) {
	                	this.choices = response.data.question_choices;
	                }

	                if (response.data.code) {
	                	this.code = response.data.code;
	                }

	                if (response.data.filter_question.length != 0) {
	                	this.filterQuestion = response.data.filter_question;
	                }

	                // console.log(response.data);
	                
	                this.loading = false
	                this.loadingChoices = false
	            });

        		 axios.get('/api/admin/question-number/'+this.$route.params.id).then(response => {
        			this.number = response.data;
  	            });
        	},

        	questionCodes() {
        		axios.get('/api/admin/choices').then(response => {
        			this.codes = response.data;
	            });
        	},

        	impactFactor(event) {
        		this.form.impact_factor = event.target.checked;
        		this.form.put('/api/admin/impact-factor/'+this.form.id).then(response => {
        			Fire.$emit('loadQuestion');
		            Fire.$emit('questionCodes');
 					Toast.fire({
	                  type: 'success',
	                  title: 'Impact factor updated successfully'
	                });
	            }).catch(() => {
	            	Toast.fire({
	                  type: 'error',
	                  title: 'Whoops! Something went wrong!'
	                });
	            });
        	},

        	questionType(event) {
        		this.form.code_id = event.target.value;
        		this.form.put('/api/admin/code-id/'+this.form.id).then(response => {
 					Toast.fire({
	                  type: 'success',
	                  title: 'Question type updated successfully'
	                });
	            }).catch(() => {
	            	Toast.fire({
	                  type: 'error',
	                  title: 'Whoops! Something went wrong!'
	                });
	            });
        	},

        	accountType(event) {
        		this.form.account_type = event.target.value;
        		this.form.put('/api/admin/filter-question/'+this.form.id).then(response => {
        			Fire.$emit('loadQuestion');
		            Fire.$emit('questionCodes');
 					Toast.fire({
	                  type: 'success',
	                  title: 'Account type updated successfully'
	                });
	                this.loading = false;
	                this.loadingChoices = false;
	            }).catch(() => {
	            	Toast.fire({
	                  type: 'error',
	                  title: 'Whoops! Something went wrong!'
	                });
	            });
        	},

        	editQuestion() {
        		this.showModal = true;
        		
        	},

        	updateQuestion() {
        		this.form.put('/api/admin/questions/'+this.form.id)
		            .then(() => {
		                this.showModal = false;
		                Fire.$emit('loadQuestion');
		                Fire.$emit('questionCodes');
		                Toast.fire({
		                  type: 'success',
		                  title: 'Question edited successfully'
		                });
		                this.loading = false;
	                	this.loadingChoices = false;
		            })
		            .catch(() => {
		            	Toast.fire({
		                  type: 'error',
		                  title: 'Whoops! Something went wrong!'
		                });
		            });
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
		                this.$router.push('/admin/questions/');
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
        }
    }
</script>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>