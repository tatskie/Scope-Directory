<template>
	<div class="col-md-12">
        <user-data></user-data>
    </div>
</template>

<script>
    import User from './users/User';

    export default {
        components:{
            "user-data":User
        }  
    }
</script>
