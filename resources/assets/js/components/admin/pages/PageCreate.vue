<template>
  <div class="editor">
    <div class="editor-content">
      <form class="editor-form" @submit.prevent="createPage" @keydown="form.errors.clear($event.target.name)">

         <div class="editor-head">
           <div class="editor-input">
             <input type="text" id="title" name="title" placeholder="Add Title" v-model="form.title"/>
           </div>


           <span class="help text-danger" v-if="form.errors.has('title')">
               <strong v-text="form.errors.get('title')"></strong>
           </span>
         </div>

         <div class="editor-body">
             <tinymce name="body" id="body" v-model="form.body"></tinymce>
         </div>
         <div class="editor-footer">
             <button class="btn-create -withlabel" :disabled="form.errors.any()">
               <i class="ico-create"></i>
               <span>Create</span>
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

        data () {
          return {
            showModal: false,
            requestType: '',

            posts : {},
            // form: new Form()

            form: new Form({
              id: '',
              // editor-title: '',
              post: '',
            })
          };
        },

        methods: {
            createPage() {
                this.$Progress.start();

                this.form.post('/api/admin/pages')
                    .then(response => {
                        Toast.fire({
                          type: 'success',
                          title: 'Page created successfully'
                        });
                        this.$Progress.finish(); 
                        this.$router.push('/admin/pages/'+ response.data.id);                 
                    })
                    .catch(() => {
                        this.$Progress.fail(); 
                    });
            },
        }
    }
</script>
