<template>
  <div class="col-md-12">
    <div class="contents-head">
        <h2 style="margin-right:20px">My Public Profile</h2>
        <publish-public-profile v-if="!information || information.length"></publish-public-profile>
        <update-public-profile v-else></update-public-profile>
        <div class="btn-create -withlabel" @click="publicProfile()">
          <span>View Public Profile</span>
        </div>
        <!-- <a :href="'/'+scope.scope">click here...</a> -->
    </div>

    <div class="dashboard-contents-body" v-if="loading">
      <div class="emptylist">
        <img src="/assets/assets/images/loading/loading.gif">
      </div>
    </div>

      <div id="dashboard-body-content" v-else>
      <div class="dashboard-card">
        <div>
          <div id="scope-number"><h3 style="color: red;">{{ scope.scope }}</h3></div>
          <div id="main-photo"><img :src="'/public/assets/images/user/'+card.photo" height="165" width="134"></div>
          <div id="academic-name"><h5>{{ user.name | upText }}</h5></div>
          <div id="academic-categories">
            <h5>Level {{ category.number }}</h5>
            <h5>{{ category.specialist_title }}</h5>
          </div>
          <div id="academic-pif"><h5>{{ tif.title }}</h5></div>
          <div id="valid-until"><h5>03/02/2023</h5></div>
        </div>
      </div>

      <div class="dashboard-back-card">
        <div>
        </div>
      </div>

      <br>
      <div v-if="information.length !== 0">
        <div v-if="information.is_present == 1">
          <h5><strong>Employment: </strong>{{ information.from | formatDate }} to Present | {{ information.employer }}</h5>
        </div>
        <div v-else>
          <h5><strong>Employment: </strong>{{ information.from | formatDate }} to {{ information.to | formatDate }}</h5>
        </div>
        <div>
          <h5><strong>Bio: </strong><br>{{ information.bio }}</h5>
        </div>
        <div>
          <h5><strong>H Index Google Scholar: </strong>{{ information.index }}</h5>
        </div>
      <div>

        <div class="contents-head">
          <h2><span style="font-size:20px; margin-bottom:20px; margin-left:-20px"><strong>Publications</strong></span></h2>
          <create-publication></create-publication>
        </div>
        <div v-if="publications.length">
          <table cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th width="50">Year</th>
                <th width="500">Title</th>
                <th width="200">Journal</th>
                <th width="189">DOI</th>
                <th width="150">Source</th>
                <th width="150">Operation</th>
              </tr>
            </thead>
            <br>
            <tbody>
              <tr v-for="publication in publications">
                <th>{{ publication.year }}</th>
                <th>
                  {{ publication.title }}
                </th>
                <th>{{ publication.journal }}</th>
                <th>{{ publication.doi }}</th>
                <th>{{ publication.source }}</th>
                <th>
                  <edit-publication :publication="publication"></edit-publication>
                  <delete-publication :publication="publication"></delete-publication>
                </th>
              </tr>
              <br>
            </tbody>
          </table>
        </div>

        <div class="contents-head">
          <h2><span style="font-size:20px; margin-bottom:20px; margin-left:-20px"><strong>Recent Conference Presentations</strong></span></h2>
          <create-conference></create-conference>
        </div>
        <div v-if="conferences.length">
          <table cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th width="50">Year</th>
                <th width="500">Name</th>
                <th width="200">Location</th>
                <th width="189">Link</th>
                <th width="150">Operation</th>
              </tr>
            </thead>
            <br>
            <tbody>
              <tr v-for="conference in conferences">
                <th>{{ conference.year }}</th>
                <th>
                  {{ conference.name }}
                </th>
                <th>{{ conference.location }}</th>
                <th>{{ conference.link }}</th>
                <th>
                  <edit-conference :conference="conference"></edit-conference>
                  <delete-conference :conference="conference"></delete-conference>
                </th>
              </tr>
              <br>
            </tbody>
          </table>
        </div>

        </div>
      </div>
    </div><!--END dashboard-body-content-->
  </div>
</template>

<script>
  import '../../common/table/Table'
  import Modal from '../../common/Modal'
  import PublishPublicProfile from '../notification/PublishPublicProfile'
  import UpdatePublicProfile from '../notification/UpdatePublicProfile'
  import CreatePublication from '../publication/Create'
  import DeletePublication from '../publication/Delete'
  import EditPublication from '../publication/Edit'
  import CreateConference from '../conferences/Create'
  import DeleteConference from '../conferences/Delete'
  import EditConference from '../conferences/Edit'

    export default {
      components: {
        Modal,
        "publish-public-profile": PublishPublicProfile,
        "update-public-profile": UpdatePublicProfile,
        "create-publication": CreatePublication,
        "delete-publication": DeletePublication,
        "edit-publication": EditPublication,
        "create-conference": CreateConference,
        "delete-conference": DeleteConference,
        "edit-conference": EditConference
      },

      data () {
        return {
          user : [],
          scope : [],
          card: [],
          tif: [],
          loading: true,
          category: {
            specialist_title: '',
            class: ''
          },
          information: [],
          publications: [],
          conferences: []
        }
      },

      created () {
        this.loadProfile(); // Load the user profile

        this.loadLicenseCategory(); // Load the user license category

        this.loadTIFLevel(); // Load the user TIF Level

        this.loadInformation(); // Load information

        this.loadPublication(); // Load Publication

        this.loadConference(); // Load Conference

        Fire.$on('loadProfile',() =>{
              this.loadProfile();
        });

        Fire.$on('loadLicenseCategory',() =>{
              this.loadLicenseCategory();
        });

        Fire.$on('loadTIFLevel',() =>{
              this.loadTIFLevel();
        });

        Fire.$on('loadInformation',() =>{
              this.loadInformation();
        });

        Fire.$on('loadPublication',() =>{
              this.loadPublication();
        });

        Fire.$on('loadConference',() =>{
              this.loadConference();
        });
      },

      methods: {

        loadProfile() {
            this.loading = true
            axios.get('/api/academia/profile').then(({data}) => (this.user = data, this.scope = data.scope, this.card = data.card));
            this.loading = false
        },

        loadLicenseCategory() {
            axios.get('/api/academia/license-category').then(({data}) => (this.category = data));
        },

        loadTIFLevel() {
            axios.get('/api/academia/tif-level').then(({data}) => (this.tif = data));
        },

        loadInformation() {
            axios.get('/api/academia/informations').then(({data}) => (this.information = data));
        },

        loadPublication() {
            axios.get('/api/academia/publications').then(({data}) => (this.publications = data));
        },

        loadConference() {
            axios.get('/api/academia/conferences').then(({data}) => (this.conferences = data));
        },

        publicProfile() {
            window.open("/"+ this.scope.scope);
        }
      }
    }
</script>

<style>
        #div1{
            height:300px;
            width:300px;
            margin:0;
            }
        #div2{
            height:300px;
            width:300px;
            position:relative;
            left:675px;
            bottom:290px;
            }
         #div3{
            height:300px;
            width:300px;
            position:relative;
            bottom:130px;
            }
        #div4{
            height:300px;
            width:300px;
            position:relative;
            left:675px;
            bottom:430px;
            }
    </style>