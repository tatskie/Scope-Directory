<template>
	<div class="col-md-12">
        <payment-details></payment-details>
    </div>
</template>

<script>
    import Details from '../editor/billing/Details';

    export default {
        components:{
            "payment-details":Details,
        }  
    }
</script>
