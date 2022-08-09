<template>
  <div class="col-md-12">
    <div class="contents-head">
        <h2 style="margin-right:20px">My Public Profile</h2>
        <a :href="'/TLP-209315-'+user.id">click here...</a>
    </div>
    <div id="dashboard-body-content">
      <div id="data-left">
  
      </div>  

      <div id="data-right">
      
      </div>
    </div><!--END dashboard-body-content-->
  </div>
</template>

<script>

    export default {
      components: {
      },

      data () {
        return {
          user : [],
        }
      },

      created () {
        this.loadProfile(); // Load the user profile
      },

      methods: {
        loadProfile() {
            axios.get('/api/academia/profile').then(({data}) => (this.user = data, this.card = data.card));
        }
      }
    }
</script>