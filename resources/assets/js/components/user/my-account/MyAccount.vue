<template>
	<div class="col-md-12">
		<div class="contents-head">
	      <h2 style="margin-right:20px">My SCOPE Profile</h2>
		    <order-licence></order-licence>
  		  <request-delete></request-delete>
		</div>
		<div id="dashboard-body-content">

      <div class="alert alert-danger" role="alert" v-if="!information || information.length">
            Next - Setup Your Public Profile
            <a href="#" class="float-right mark-as-read" @click="setupPublicProfile()">
                Click Here!
            </a>
      </div>

			<div id="data-left">
				<h2><span style="font-size:20px; margin-bottom:20px"><strong>Profile Details</strong></span></h2>
          <table cellspacing="0" cellpadding="0">
            <col width="189">
            <col width="16">
            <col width="203">
            <tr>
              <td width="189">Title </td>
              <td width="16">:</td>
              <td width="203">{{ card.academic_title }}</td>
            </tr>
            <tr>
              <td>Name </td>
              <td>:</td>
              <td>{{ user.name }}</td>
            </tr>
            <tr>
              <td>Email address </td>
              <td>:</td>
              <td>{{ user.email }}</td>
            </tr>
            <tr>
              <td>Gender</td>
              <td>:</td>
              <td>{{ card.gender }}</td>
            </tr>
          </table>
          <table cellspacing="0" cellpadding="0" v-for="question in questions">
            <col width="189">
            <col width="16">
            <col width="207">
            <tr>
              <td width="189"></td>
              <td width="16"></td>
              <td width="207"></td>
            </tr>
            <tr v-if="question.question_id == 1">
              <td>Bachelor degree</td>
              <td>:</td>
              <td v-show="question.is_yes">Yes</td>
              <td v-show="!question.is_yes"></td>
            </tr>
            <tr v-if="question.question_id == 2" v-show="!question.is_yes">
              <td>Master degree</td>
              <td>:</td>
              <td></td>
            </tr>
            <tr v-if="question.question_id == 2 && question.followup_id == 1">
              <td>Master degree</td>
              <td>:</td>
              <td>Yes/ {{ question.answer }}</td>
            </tr>
            <tr v-if="question.question_id == 4" v-show="!question.is_yes">
              <td>Phd</td>
              <td>:</td>
              <td></td>
            </tr>
            <tr v-if="question.question_id == 4 && question.followup_id == 2">
              <td>Phd</td>
              <td>:</td>
              <td>Yes/ {{ question.answer }}</td>
            </tr>
          </table>
          <table cellspacing="0" cellpadding="0" v-for="question in questions">
            <col width="189">
            <col width="16">
            <col width="209">
            <tr>
              <td width="189"></td>
              <td width="16"></td>
              <td width="209"></td>
            </tr>
            <tr v-if="question.question_id == 21" v-show="!question.is_yes">
              <td>Years teaching</td>
              <td>:</td>
              <td></td>
            </tr>
            <tr v-if="question.question_id == 21 && question.followup_id == 11">
              <td>Years teaching</td>
              <td>:</td>
              <td>{{ question.answer }}</td>
            </tr>
          </table>
          <table cellspacing="0" cellpadding="0" v-for="question in questions">
            <col width="189">
            <col width="16">
            <col width="209">
            <tr>
              <td width="189"></td>
              <td width="16"></td>
              <td width="209"></td>
            </tr>
            <tr v-if="question.question_id == 10">
              <td>TESOL certified</td>
              <td>:</td>
              <td v-show="question.is_yes">Yes</td>
              <td v-show="!question.is_yes"></td>
            </tr>
          </table>
          <table cellspacing="0" cellpadding="0" v-for="question in questions">
            <col width="189">
            <col width="16">
            <col width="211">
            <tr>
              <td width="189"></td>
              <td width="16"></td>
              <td width="211"></td>
            </tr>
            <tr v-if="question.question_id == 22" v-show="!question.is_yes">
              <td>Years teaching (English or other subjects)</td>
              <td>:</td>
              <td></td>
            </tr>
            <tr v-if="question.question_id == 22 && question.followup_id == 12">
              <td>Years teaching (English or other subjects)</td>
              <td>:</td>
              <td>{{ question.answer }}</td>
            </tr>
          </table>
          <table cellspacing="0" cellpadding="0" v-for="question in questions">
            <col width="189">
            <col width="16">
            <col width="211">
            <tr>
              <td width="189"></td>
              <td width="16"></td>
              <td width="211"></td>
            </tr>
            <tr v-if="question.question_id == 16" v-show="!question.is_yes">
              <td>Conferences spoken at</td>
              <td>:</td>
              <td></td>
            </tr>
            <tr v-if="question.question_id == 16 && question.followup_id == 8">
              <td>Conferences spoken at</td>
              <td>:</td>
              <td>{{ question.answer }}</td>
            </tr>
            <tr v-if="question.question_id == 27" v-show="!question.is_yes">
              <td>Publication(s)</td>
              <td>:</td>
              <td></td>
            </tr>
            <tr v-if="question.question_id == 27 && question.followup_id == 16">
              <td>Publication(s)</td>
              <td>:</td>
              <td>{{ question.answer }}</td>
            </tr>
          </table>
          <table cellspacing="0" cellpadding="0" v-for="question in questions">
            <col width="189">
            <col width="16">
            <col width="213">
            <tr>
              <td width="189"></td>
              <td width="16"></td>
              <td width="213"></td>
            </tr>
            <tr v-if="question.question_id == 27" v-show="!question.is_yes">
              <td>Held supervisory position(s)</td>
              <td>:</td>
              <td></td>
            </tr>
            <tr v-if="question.question_id == 18 && question.followup_id == 10">
              <td>Held supervisory position(s)</td>
              <td>:</td>
              <td v-show="question.is_yes">Yes</td>
              <td v-show="!question.is_yes">No</td>
            </tr>
          </table>
          <table cellspacing="0" cellpadding="0">
            <col width="189">
            <col width="16">
            <col width="211">
            <tr>
              <td width="189"></td>
              <td width="16"></td>
              <td width="211"></td>
            </tr>
            <tr>
              <td>Password <span style="color:#39c8df; font-weight:bold">*</span></td>
              <td>:</td>
              <td><change-password></change-password></td>
            </tr>
          </table>
				  	<br>
				  	<h2><span style="font-size:16px; margin-bottom:10px"><strong>Your SCOPE: </strong></span></h2>
            <p style="color: #00a0e3; margin-left:10px">SCOPE Number: {{scope.scope}}</p>
				  	<p style="color: #00a0e3; margin-left:10px" v-if="category.number">Level/Title: L-{{category.number}} {{ card.title }}</p>
            <p style="color: #00a0e3; margin-left:10px" v-if="aif.title">PIF: {{ aif.title }}</p>
					<br>
					<div class="card-body" style="margin-bottom: 10px;">
              		<update-profile></update-profile>
            		</div>
			</div>	

		  	<div id="data-right">
				<img :src="'/public/assets/images/user/'+card.photo" alt="Card image cap" height="300" width="240">
				<br><br>
	            <upload-photo></upload-photo>
				<em style="font-size:11px">File format: JPG or PNG, not more than 2MB in file size</em>
			</div>
		</div><!--END dashboard-body-content-->
	</div>
</template>

<script>
   // import QuestionModal from './QuestionModal'
  import '../../common/table/Table'

  import Modal from '../../common/Modal'
  import UploadPhoto from './UploadPhoto'
  import UpdateProfile from './UpdateProfile'
  import ChangePassword from './ChangePassword'
  import CV from './CV/PDF'
  import Payment from './Payment/PaymentForm'
  import RequestDelete from '../license/RequestDelete'
  import OrderLicence from '../license/OrderLicence'
  import PublishPublicProfile from '../notification/PublishPublicProfile'
  

    export default {
      components: {
        Modal,
        "upload-photo": UploadPhoto,
        "update-profile": UpdateProfile,
        "download-cv": CV,
        "payment-form": Payment,
        "change-password": ChangePassword,
        "request-delete": RequestDelete,
        "order-licence": OrderLicence,
        "publish-public-profile": PublishPublicProfile

      },
      
      data () {
        return {
          user : [],
          card: [],
          aif: [],
          scope: [],
          questions: [],
          category: {
            specialist_title: '',
            class: ''
          },
          information: []
        }
      },

      created () {
        this.loadProfile(); // Load the user profile

        this.loadLicenseCategory(); // Load the user license category

        this.loadTIFLevel(); // Load the user TIF Level

        this.loadQuestions(); //load questions details

        this.loadInformation(); // Load information

        Fire.$on('loadProfile',() =>{
          this.loadProfile();
        });
      },

      methods: {
        loadProfile() {
            axios.get('/api/academia/profile').then(({data}) => (this.user = data, this.card = data.card, this.scope = data.scope));
        },

        loadQuestions() {
            axios.get('/api/academia/questions').then(({data}) => (this.questions = data));
        },

        loadLicenseCategory() {
            axios.get('/api/academia/license-category').then(({data}) => (this.category = data));
        },

        loadTIFLevel() {
            axios.get('/api/academia/tif-level').then(({data}) => (this.aif = data));
        },

        setupPublicProfile() {
          this.$router.push('/academia/profile/').catch(err => {});
        },

        loadInformation() {
            axios.get('/api/academia/informations').then(({data}) => (this.information = data));
        }
      }
    }
</script>