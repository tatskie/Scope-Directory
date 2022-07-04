<template>
  <div class="product">
    <div class="contents-head">
      <h2><span style="margin-right:20px">Pages</span></h2>

      <div class="btn-create -withlabel" @click="createPage">
        <i class="ico-create"></i>
        <span>Create</span>
      </div>
    </div>

    <div class="emptylist" v-if="pages.length == 0">
      <i class="ico-empty-folder"></i>
    </div>
    <tbl v-else>
      <template slot="head">
        <tbl-td class="title">
          title
        </tbl-td>

        <tbl-td class="description">
          description
        </tbl-td>

        <tbl-td class="actions">

        </tbl-td>
      </template>

      <template slot="body">
        <tbl-row v-for="page in pages" :key="page.id">
          <tbl-td class="title">
            <a href="#">{{ page.title | upText}}</a>
          </tbl-td>

          <tbl-td class="description" :isHtml="true">
            <div v-html="page.body"></div>
          </tbl-td>

          <tbl-td class="actions">
            <div class="btn-edit -icon"  @click="editPage(page.id)"><i class="ico-edit"></i></div>
            <div class="btn-delete -icon" @click="deletePage(page.id)">
              <i class="ico-delete"></i>
            </div>
          </tbl-td>
        </tbl-row>
      </template>

      <template slot="footer">

      </template>
    </tbl>


  </div>
</template>

<script>
    export default {
        data: function() {
          return {
            pages : {},
            form: new Form()
          };
        },
        methods: {
            createPage() {
              this.$router.push('/admin/pages-create');
            },

            editPage(id) {
              this.$router.push('/admin/pages/'+id);
            },

            loadPages() {
                axios.get('/api/admin/pages').then(({data}) => (this.pages = data.data));
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
                    this.form.delete('/api/admin/pages/'+ id).then(data => {
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
            }
        },
        created() {
            this.loadPages(); // Load the data in page
            Fire.$on('loadPage',() =>{
                  this.loadPages();
            });
        }
    }
</script>
