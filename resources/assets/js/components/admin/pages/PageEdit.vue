<template>
  <div class="editor">
    <div class="editor-content">
      <form class="editor-form" @submit.prevent="updatePage" @keydown="form.errors.clear($event.target.name)">

         <div class="editor-head">
           <div class="editor-input">
             <input type="text" class="form-control" id="title" name="title" v-model="form.title"/>
           </div>

           <span class="help text-danger" v-if="form.errors.has('title')">
               <strong v-text="form.errors.get('title')"></strong>
           </span>
         </div>

         <div class="editor-body">
            <tinymce name="body" id="body" v-model="form.body"></tinymce>
            <span class="help text-danger" v-if="form.errors.has('body')">
                <strong v-text="form.errors.get('body')"></strong>
            </span>
         </div>
         <div class="editor-footer">
             <button class="btn-update -withlabel" :disabled="form.errors.any()">
               <i class="ico-update"></i>
               <span>Update</span>
             </button>
         </div>
     </form>
    </div>

    <div class="editor-sidebar">
      <div class="editor-box">
        <div class="editor-title">
          <h3>Page Attributes</h3>
        </div>

        <div class="editor-box-inner">
          <div class="editor-box-item">
            <label for="parent-id">Parent</label>

            <div class="editor-box-input">
              <select class="parent-id" name="parent-id">
                <option value="">(no parent)</option>
                <option value="">list sa pages</option>
              </select>
            </div>
          </div>

          <div class="editor-box-item">
            <label for="subpage-order">Order</label>

            <div class="editor-box-input">
              <input type="text" name="subpage-order" value="" placeholder="0">
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
    import tinymce from 'vue-tinymce-editor';

    export default {
        components:{
            "tinymce": tinymce
        },

        mounted () {
            // Do something useful with the data in the template
            axios.get('/api/admin/pages/'+this.$route.params.id).then(response => {
                this.form.fill(response.data);
            });
        },

        data: function() {
          return {
            form: new Form({
                id: '',
                title: '',
                body: ''
            })
          };
        },

        methods: {
            updatePage() {
                this.$Progress.start();

                this.form.put('/api/admin/pages/'+this.form.id)
                    .then(() => {
                        Toast.fire({
                          type: 'success',
                          title: 'Page edited successfully'
                        });
                        this.$Progress.finish(); 
                        this.$router.push('/admin/pages');
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            }
        }
    }
</script>
