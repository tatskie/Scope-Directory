<template>
	<div class="publication">
    <div class="btn-delete -icon" @click="deletePublication(publication.id)">
      <i class="ico-delete"></i>
    </div>
  </div>
</template>

<script>
    export default {
      props: ['publication'],

      data () {
        return {
          form : new Form({
            id: '',
            year: '',
            title: '',
            journal: '',
            doi: '',
            source: ''
          })
        }
      },

      methods: {
        deletePublication() {
          this.form.fill(this.publication);
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
              this.form.delete('/api/academia/publications/'+ this.form.id).then(response => {
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