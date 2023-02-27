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
				  	<p style="color: #00a0e3; margin-left:10px">Level/Title: L-3 Special Title</p>
            <p style="color: #00a0e3; margin-left:10px">PIF: My Title</p>
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

    <div class="alert alert-danger" role="alert" v-if="!information || information.length">
            Next - Setup Your Public Profile
            <a href="#" class="float-right mark-as-read" @click="setupPublicProfile()">
                Click Here!
            </a>
      </div>
	</div>
</template>

<script>
   // import QuestionModal from './QuestionModal'
  import '../../../common/table/Table'

  import Modal from '../../../common/Modal'
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
          journal: [],
          card: [],
          scope: [],
          information: []
        }
      },

      created () {
        this.loadProfile(); // Load the user profile

        Fire.$on('loadProfile',() =>{
          this.loadProfile();
        });
      },

      methods: {
        loadProfile() {
            axios.get('/api/editor/profile').then(({data}) => (this.user = data, this.journal = data.journals, this.card = data.card, this.scope = data.scope));
        },

        setupPublicProfile() {
          this.$router.push('/editor/profile/').catch(err => {});
        },

        // loadInformation() {
        //     axios.get('/api/teacher/informations').then(({data}) => (this.information = data));
        // }
      }
    }
</script>