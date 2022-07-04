<template>
	<div class="choice">
    <div class="btn-delete -icon" @click="deleteChoice()">
        <i class="ico-delete"></i>
    </div>
  </div>
</template>

<script>
    export default {
      props: ['choice'],

      data () {
        return {
          form: new Form({
            id: '',
            label: '',
            question_id: '',
            points: ''
          })
        }
      },

      created() {
        
      },  

      methods: {
        deleteChoice() {
          this.form.fill(this.choice);
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
              this.form.delete('/api/admin/question-choices/'+ this.form.id).then(response => {
                  Fire.$emit('loadQuestion');
                  Fire.$emit('questionCodes');
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