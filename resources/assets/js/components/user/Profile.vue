<template>
	<div class="col-md-12">
        <public-profile></public-profile>
    </div>
</template>

<script>
    import Profile from './my-account/Profile';

    export default {
        components:{
            "public-profile": Profile,
        }  
    }
</script>
