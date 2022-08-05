<template>
	<div class="col-md-12">
        <div class="questionaire">
		    <div class="contents-head">
		      <h2 style="margin-right:20px">Upgrading your Classification</h2>
		      <order-licence></order-licence>
    		  <request-delete></request-delete>
		    </div>
		<div id="dashboard-body-content">
		    <div class="contents-body">
		      	<p>Your licence has a validity of 2 (two) years, however if you undertake higher studies, join a TESOL organization,<br> publish teaching materials, (or any other significant fact in TESOL occurs) you may <a href="https://www.tesol-licence.education/contact-us/" target="https://scope.directory/contact-us">contact us</a> to assess if your licence can be upgraded. </p><br>
				<p>You may make a new application any time.</p><br>
				<!--<div class="form-btn">
				<button class="btn-create -withlabel"><a href="https://my.tesol-licence.education/register" target="_blank">MAKE A NEW APPLICATION</a></button></div>-->
		    </div>
		</div>	
		 </div>
    </div>
</template>

<script>
    import Question from './questions/Question';
	import RequestDelete from './license/RequestDelete'
    import OrderLicence from './license/OrderLicence'

    export default {
        components:{
            "question":Question,
			"request-delete": RequestDelete,
            "order-licence": OrderLicence
        }  
    }
</script>
