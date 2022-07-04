<template>
    <div>
        <div class="form-group">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Sub Pages</h2>
                    <button class="btn btn-primary btn-xs" @click="newModal">Create Sub Pages</button>
                </div>
            </div>
        </div>

        <modal-sub-page :page=" this.page "></modal-sub-page>

        <div class="form-group">
            <div class="card">
                <div class="card-body">                   
                    <table class="table table-inverse">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Edit or Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="page in subpages" :key="page.id">
                                <td>{{ page.title }}</td>
                                <td v-html="page.body"></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="#"  @click="editModal(page)"><i class="fa fa-edit"></i></a>
                                    |
                                    <a class="btn btn-sm btn-danger" href="#" @click="deletePage(page.id)"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>    

    import SubPagesModal from './SubPagesModal'

    export default {
        props: ['page'],

        components:{
            "modal-sub-page": SubPagesModal
        },

        data: function() {
          return {
            subpages : {},
            form: new Form()
          };
        },

         methods: {
            loadPages() {
                axios.get('/admin/sub-pages/'+ this.page.id).then(({data}) => (this.subpages = data.data));
            },

            newModal() {
                $('#subPagesModal').modal('show');
                Fire.$emit('createPage');
            },

            editModal(page) {
                this.form.reset();
                $('#subPagesModal').modal('show');
                Fire.$emit('editPage', page);
            },

            deletePage(id) {
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
                    this.form.delete('/admin/sub-pages/'+ id).then(data => {
                        Fire.$emit('loadPage');
                        swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                    }).catch(() => {
                        swal.fire(
                          'Failed!!',
                          'Something went wrong.',
                          'warning'
                        )
                    });
                  }
                })
            },
        }, 

        created() {
            this.loadPages(); // Load the data in page

            Fire.$on('loadPage',() =>{
                  this.loadPages();
            });
        }
    }
</script>
