<template>
	<div class="col-md-12">
		<div class="contents-head">
	      <h2>Sample TESOL Designations</h2>

	      <request-delete></request-delete>
	      <order-licence></order-licence>
	      <div class="btn-create -withlabel">
	        <span>Print</span>
	      </div>
	    </div>
	    <div class="dashboard-card">
	      	<div class="card-title">
				  <h1 class="title">PROFESSIONAL TESOL TEACHER LICENCE</h1>	
				  <img class="tesol-one-logo" src="/assets/images/card/logo.png" height="85" width="110">
				  <div class="teacher-data">
				  	<div><small>NAME:</small><h5>{{ user.name }}</h5></div>
				  	<div style="width: 50%;"><small>TITLE:</small><h5>{{ category.specialist_title }}</h5></div>
				  	<div><small>CITIZENSHIP:</small><h5>{{ card.citizenship }}</h5></div>
				  </div>
				  <img class="teacher-photo" :src="'/assets/assets/images/user/'+card.photo" height="100" width="100">
				  <div class="background-photo">
				  	<img :src="'/assets/assets/images/user/'+card.photo" height="60" width="60">
				  	<h5 class="valid-date">Valid Until: 07/2023</h5>
				  </div>
				  <div class="barcode">
				  	<img src="/assets/images/card/barcode.png" height="45" width="120">
				  </div>
				  <div class="qr-code">
				  	<img src="/assets/images/card/qr-code.png" height="90" width="90">
				  </div>
			</div>
	    </div>
	    <br>
<!--	    <div class="contents-body">
	    	<div id="div1">
	    		<img src="/assets/images/sample-licence/1.PNG">
		    </div>

		    <div id="div2">
		    	<img src="/assets/images/sample-licence/2.PNG">
		    </div>

		    <div id="div3">
		    	<img src="/assets/images/sample-licence/3.PNG">
		    </div>

		    <div id="div4"> 
		    	<img src="/assets/images/sample-licence/4.PNG">
		    </div>
	    </div>
-->    </div>
</template>

<script>

		// import QuestionModal from './QuestionModal'
	  import '../../common/table/Table'

	  import Modal from '../../common/Modal'
      import RequestDelete from './RequestDelete'
      import OrderLicence from './OrderLicence'

      export default {
	      components: {
	        Modal,
	        "request-delete": RequestDelete,
	        "order-licence": OrderLicence
	      },

	      data () {
	        return {
	          user : [],
	          card: [],
	          tif: [],
	          category: {
	            specialist_title: '',
	            class: ''
	          }
	        }
	      },

	      created () {
	        this.loadProfile(); // Load the user profile

	        this.loadLicenseCategory(); // Load the user license category

	        this.loadTIFLevel(); // Load the user TIF Level

	        Fire.$on('loadProfile',() =>{
	          this.loadProfile();
	        });
	      },

	      methods: {
	        loadProfile() {
	            axios.get('/api/academia/profile').then(({data}) => (this.user = data, this.card = data.card));
	        },

	        loadLicenseCategory() {
	            axios.get('/api/academia/license-cateogry').then(({data}) => (this.category = data));
	        },

	        loadTIFLevel() {
	            axios.get('/api/academia/tif-level').then(({data}) => (this.tif = data));
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