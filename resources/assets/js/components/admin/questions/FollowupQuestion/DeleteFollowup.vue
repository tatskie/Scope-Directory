<template>
	<div class="choice">
    <div class="btn-delete -icon" @click="deleteFollowup()">
        <i class="ico-delete"></i>
    </div>
  </div>
</template>

<script>
    export default {
      props: ['followup'],

      data () {
        return {
          form: new Form({
            id: '',
            question: '',
            question_id: '',
            code_id: ''
          })
        }
      },

      methods: {
        deleteFollowup() {
          this.form.fill(this.followup);
          swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              this.form.delete('/api/admin/followup-question/'+ this.form.id).then(response => {
                  Fire.$emit('loadQuestion');
                  Fire.$emit('questionCodes');
                  location.reload();
                  swal.fire(
                    response.data.status,
                    response.data.message,
                    response.data.code
                  )
              }).catch(response => {
                  swal.fire(
                    'Failed!!',
                    'Something went wrong.',
                    'warning'
                  )
              });
            }
          });
        }
      }
    }
</script>