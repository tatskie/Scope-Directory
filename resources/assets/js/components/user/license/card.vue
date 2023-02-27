<template>
	<div class="col-md-12">
		<div class="contents-head">
	      <h2 style="margin-right:20px">Professional SCOPE Designation ID Card</h2>
	      <order-licence></order-licence>
		  <request-delete></request-delete>
	    </div>
		<div id="dashboard-body-content">
		<div><h2>You have three choices to proceed with.</h2>
			<br>
			<h2>Option 1</h2>
			<p>Order a hard copy of your SCOPE card (production fee and delivery fees apply).</p>
			<br>
			<h2>Option 2</h2>
			<p>You may keep your PTD (Professional SCOPE Designation) stored online.</p>
			<br>
			<h2>Option 3</h2>
			<p>Leave the site and delete your application. You may re-apply in the future.</p>
			<br>
			
			<h2>To Order a hard copy</h2>
			<ul style="margin-left:30px">
			<li>Step one: Confirm your data is correct – spelling, photo size, etc...</li>
			<li>Step two: Complete the Paypal transaction</li>
			<li>Step three: We confirm receipt of your request and submit your order for preparation</li>
			<li>Step four: Once the card is ready we contact you seeking address details for delivery and <br>notifying of the Delivery fee. We use FedEx or DHL who in turn may use local carriers)</li>
			<li>Step five: You confirm receipt of your card</li>
			</ul>
		</div>
		<!-- <br>
		<h2>SAMPLE ID Card</h2>
			
	    <div class="dashboard-card">
		<div>
	      	<div id="main-photo"><img :src="'/public/assets/images/user/'+card.photo" height="217" width="175"></div>
		  	<div id="academic-name"><h3>{{ user.name }}</h3></div>
			<div id="academic-categories"><h3>{{ category.specialist_title }}</h3></div>
			<div id="academic-pif"><h3>{{ tif.title }}</h3></div>
			<div id="valid-until"><h5>03/02/2021</h5></div>
	   </div>
	   </div> -->
	   <div style="width:140px"><order-licence></order-licence></div>
	</div>
	</div>
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
	            axios.get('/api/academia/license-category').then(({data}) => (this.category = data));
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