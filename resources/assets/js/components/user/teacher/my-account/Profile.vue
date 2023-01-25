<template>
  <div class="col-md-12">
    <div class="contents-head">
        <h2 style="margin-right:20px">My Public Profile</h2>
        <publish-public-profile v-if="!information || information.length"></publish-public-profile>
        <update-public-profile v-else></update-public-profile>
        <div class="btn-create -withlabel" @click="publicProfile()" v-if="information">
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
        <div class="dashboard-card-id">
          <div class="dashboard-card-id-front">
            <img height="318" src="/assets/images/card/sample-id.png">
            <div class="elementor-id-data elementor-id-data-front">
              <picture class="elementor-id-data-id-img">
                <img :src="'/public/assets/images/user/'+card.photo" alt="">
              </picture>
              <span class="elementor-id-data-id">
                {{ scope.scope }}
              </span> 
              <span class="elementor-id-data-name">
                {{ user.name }}
              </span>
              <span class="elementor-id-data-title">
                {{ card.title }}
              </span> 
              <span class="elementor-id-data-imapct-factor">
                {{ tif.title }}
              </span> 
              <span class="elementor-id-data-country">
                {{ card.citizenship }}
              </span> 
              <span class="elementor-id-data-validity"> 03/01/2023</span>
            </div> 
          </div>
          <div class="dashboard-card-id-back">
            <img height="318" src="/assets/images/card/back-ID-bg.png">
          </div>
        </div>

        <br>
        <br>
        <br>

      <div class="alert alert-info" role="alert" v-if="information.length == 0">
        Please setup your public profile.
      </div>

      <div class="alert alert-info" role="alert" v-if="publications.length == 0 || conferences.length == 0 || information.length == 0">
        Next! Please complete information below.
      </div>

      <div class="alert alert-info" role="alert" v-else>
        View your public profile.
        <a href="#" class="float-right mark-as-read" @click="publicProfile()">
          Click Here!
        </a>
      </div>

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

        <div class="contents-head">
          <h2><span style="font-size:20px; margin-bottom:20px; margin-left:-20px"><strong>Special Awards</strong></span></h2>
          <create-special-award></create-special-award>
        </div>
        <div v-if="awards.length">
          <table cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th width="300">Name</th>
                <th width="300">Location</th>
                <th width="189">Link</th>
              </tr>
            </thead>
            <br>
            <tbody>
              <tr v-for="award in awards">
                <th>
                  {{ award.name }}
                </th>
                <th>{{ award.location }}</th>
                <th>{{ award.link }}</th>
                <th>
                  <edit-special-award :award="award"></edit-special-award>
                  <delete-special-award :award="award"></delete-special-award>
                </th>
              </tr>
              <br>
            </tbody>
          </table>
        </div>

        <div class="contents-head">
          <h2><span style="font-size:20px; margin-bottom:20px; margin-left:-20px"><strong>Videos</strong></span></h2>
          <create-video></create-video>
        </div>
        <div v-if="videos.length">
          <table cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th width="400">Title</th>
                <th width="400">Link</th>
              </tr>
            </thead>
            <br>
            <tbody>
              <tr v-for="video in videos">
                <th>
                  {{ video.title }}
                </th>
                <th>{{ video.link }}</th>
                <th>
                  <edit-video :video="video"></edit-video>
                  <delete-video :video="video"></delete-video>
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
  import '../../../common/table/Table'
  import Modal from '../../../common/Modal'
  import PublishPublicProfile from '../notification/PublishPublicProfile'
  import UpdatePublicProfile from '../notification/UpdatePublicProfile'
  import CreatePublication from '../publication/Create'
  import DeletePublication from '../publication/Delete'
  import EditPublication from '../publication/Edit'
  import CreateConference from '../conferences/Create'
  import DeleteConference from '../conferences/Delete'
  import EditConference from '../conferences/Edit'
  import CreateSpecialAward from '../special-awards/Create'
  import DeleteSpecialAward from '../special-awards/Delete'
  import EditSpecialAward from '../special-awards/Edit'
  import CreateVideo from '../videos/Create'
  import DeleteVideo from '../videos/Delete'
  import EditVideo from '../videos/Edit'

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
        "edit-conference": EditConference,
        "create-special-award": CreateSpecialAward,
        "delete-special-award": DeleteSpecialAward,
        "edit-special-award": EditSpecialAward,
        "create-video": CreateVideo,
        "delete-video": DeleteVideo,
        "edit-video": EditVideo
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
          conferences: [],
          awards: [],
          videos: []
        }
      },

      created () {
        this.loadProfile(); // Load the user profile

        this.loadLicenseCategory(); // Load the user license category

        this.loadTIFLevel(); // Load the user TIF Level

        this.loadInformation(); // Load information

        this.loadPublication(); // Load Publication

        this.loadConference(); // Load Conference

        this.loadSpecialAward(); // Load Special Award

        this.loadVideos(); // Load Videos

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

        Fire.$on('loadSpecialAward',() =>{
              this.loadSpecialAward();
        });

        Fire.$on('loadVideos',() =>{
              this.loadVideos();
        });
      },

      methods: {

        loadProfile() {
            this.loading = true
            axios.get('/api/teacher/profile').then(({data}) => (this.user = data, this.scope = data.scope, this.card = data.card));
            this.loading = false
        },

        loadLicenseCategory() {
            axios.get('/api/teacher/license-category').then(({data}) => (this.category = data));
        },

        loadTIFLevel() {
            axios.get('/api/teacher/tif-level').then(({data}) => (this.tif = data));
        },

        loadInformation() {
            axios.get('/api/teacher/informations').then(({data}) => (this.information = data));
        },

        loadPublication() {
            axios.get('/api/teacher/publications').then(({data}) => (this.publications = data));
        },

        loadConference() {
            axios.get('/api/teacher/conferences').then(({data}) => (this.conferences = data));
        },

        loadSpecialAward() {
            axios.get('/api/teacher/awards').then(({data}) => (this.awards = data));
        },

        loadVideos() {
            axios.get('/api/teacher/videos').then(({data}) => (this.videos = data));
        },

        publicProfile() {
            window.open("/"+ this.scope.scope);
        }
      }
    }
</script>

<style>
.dashboard-card-id {
  display: flex;
  flex-direction: row;
  column-gap: 20px;
  align-items: flex-start;
}

.dashboard-card-id-front,
.dashboard-card-id-back {
  position: relative;
  width: 50%;
}

.dashboard-card-id-front img,
.dashboard-card-id-back img {
  width: 100%;
  height: auto;
}

.dashboard-card-id-front .elementor-id-data-front,
.dashboard-card-id-front .elementor-id-data-back {
  width: 100%;
  height: 100%;
  padding-left: 0;
}

.dashboard-card-id-front .elementor-id-data-front .elementor-id-data-id-img {
  left: 4.8%;
  padding-top: 51.5%;
  top: 31%;
  width: 25.3%;
}

.dashboard-card-id-front .elementor-id-data-front .elementor-id-data-id {
  left: 33%;
}

.dashboard-card-id-front .elementor-id-data-front .elementor-id-data-name {
  left: 32.8%;
  top: 37%;
}

.dashboard-card-id-front .elementor-id-data-front .elementor-id-data-title {
  left: 32.8%;
  top: 51%;
}

.dashboard-card-id-front .elementor-id-data-front .elementor-id-data-imapct-factor {
  left: 32.8%;
  top: 69%;
}

.dashboard-card-id-front .elementor-id-data-front .elementor-id-data-validity {
  left: 19.5%;
  top: 91.37%;
}

.dashboard-card-id-front .elementor-id-data-front .elementor-id-data-country {
  left: 32.8%;
  top: 81.6%;
}

  @media screen and (min-width: 1024px) {
    .dashboard-id {
      flex-direction: column;
    }
  }

  .elementor-id-data {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    box-sizing: border-box;
  }
  .elementor-id-data svg {
    width: 100%;
  }

  .elementor-id-data-front {
    padding-top: 12%;
    padding-left: 22%;
  }
  .elementor-id-data-front span {
    display: block;
    position: absolute;
    left: 17.9%;
    font-weight: 700;
    font-size: 2.7vw;
    line-height: 110%;
  }
  @media screen and (min-width: 768px) {
    .elementor-id-data-front span {
      font-size: 1vw;
    }
  }
  @media screen and (min-width: 1330px) {
    .elementor-id-data-front span {
      font-size: 15px;
    }
  }
  .elementor-id-data-front .elementor-id-data-id-img {
    position: absolute;
    left: 4.8%;
    top: 114%;
    width: 38.3%;
    padding-top: 77.5%;
  }
  .elementor-id-data-front .elementor-id-data-id-img img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 66%;
    object-fit: cover;
    object-position: center;

  }
  .elementor-id-data-front .elementor-id-data-id {
    position: relative;
    color: #FF0000;
    font-size: 4.1vw;
    left: 42%;
  }
  @media screen and (min-width: 768px) {
    .elementor-id-data-front .elementor-id-data-id {
      font-size: 1.34vw;
    }
  }
  @media screen and (min-width: 1330px) {
    .elementor-id-data-front .elementor-id-data-id {
      font-size: 24px;
    }
  }
  .elementor-id-data-front .elementor-id-data-name {
    top: 130.8%;
    left: 48.8%;
  }
  .elementor-id-data-front .elementor-id-data-title {
    padding-right: 0%;
    top: 179.3%;
    left: 48.8%;
  }
  .elementor-id-data-front .elementor-id-data-imapct-factor {
    top: 248.4%;
    left: 48.8%;
  }
  .elementor-id-data-front .elementor-id-data-country {
    top: 296.6%;
    left: 48.8%;
  }
  .elementor-id-data-front .elementor-id-data-validity {
    left: 29.5%;
    top: 90.5%;
    font-size: 2.5vw;
  }
  @media screen and (min-width: 768px) {
    .elementor-id-data-front .elementor-id-data-validity {
      top: 333.37%;
      font-size: 0.84vw;
    }
  }
  @media screen and (min-width: 1330px) {
    .elementor-id-data-front .elementor-id-data-validity {
      font-size: 15px;
    }
  }
</style>