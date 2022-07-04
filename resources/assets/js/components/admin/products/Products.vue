<template>
  <div class="product">
    <div class="contents-head">
      <h2><span style="margin-right:20px">Products</span></h2>

      <div class="btn-create -withlabel" @click="modalTrigger('create')">
        <i class="ico-create"></i>
        <span>Create</span>
      </div>
    </div>

    <div class="contents-body">
      <div class="emptylist" v-if="products.length == 0">
        <i class="ico-empty-folder"></i>
      </div>

      <tbl v-else>
        <template slot="head">
          <tbl-td class="name">
            name
          </tbl-td>

          <tbl-td class="detail">
            detail
          </tbl-td>

          <tbl-td class="price">
            price
          </tbl-td>

          <tbl-td class="description">
            description
          </tbl-td>

          <tbl-td class="actions">

          </tbl-td>
        </template>

        <template slot="body">
          <tbl-row v-for="product in products" :key="product.id">
            <tbl-td class="name">
              {{ product.name | upText}}
            </tbl-td>

            <tbl-td class="detail">
              {{ product.details }}
            </tbl-td>

            <tbl-td class="price">
              {{ product.price }}
            </tbl-td>

            <tbl-td class="description">
              {{ product.description }}
            </tbl-td>

            <tbl-td class="actions">
              <div class="btn-edit -icon" @click="modalTrigger('edit', product)"><i class="ico-edit"></i></div>
              <div class="btn-delete -icon" @click="deleteProduct(product.id)"><i class="ico-delete"></i></div>
            </tbl-td>
          </tbl-row>
        </template>

        <template slot="footer">

        </template>
      </tbl>
    </div>


    <modal
      :title="requestStatus ? 'Add New Product Pricing' : 'Edit New Product Pricing'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-horizontal" @submit.prevent="requestStatus ? createProduct() : updateProduct()" @keydown="form.errors.clear($event.target.name)">
            <div class="form-item">
              <label for="points">Title</label>

              <div class="form-input">
                <input
                  type="text"
                  name="name"
                  value=""
                  placeholder="title"
                  v-model="form.name"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('name')">
                    <strong v-text="form.errors.get('name')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="points">Detail</label>

              <div class="form-input">
                <input
                  type="text"
                  name="details"
                  value=""
                  placeholder="details"
                  v-model="form.details"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('details')">
                    <strong v-text="form.errors.get('details')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="points">Price</label>

              <div class="form-input">
                <input
                  type="text"
                  name="price"
                  value=""
                  placeholder="price"
                  v-model="form.price"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('price')">
                    <strong v-text="form.errors.get('price')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="points">Description</label>

              <div class="form-textarea">
                <textarea
                  name="description"
                  v-model="form.description"
                >
                </textarea>
              </div>

              <div class="form-error">
                <span v-if="form.errors.has('description')">
                    <strong v-text="form.errors.get('description')"></strong>
                </span>
              </div>
            </div>

            <div class="form-btn">
              <button class="btn-create -withlabel" :disabled="form.errors.any()" v-show="requestStatus">
                <i class="ico-create"></i>
                <span>Create</span>
              </button>

              <button class="btn-update -withlabel" :disabled="form.errors.any()" v-show="!requestStatus">
                <i class="ico-update"></i>
                <span>Update</span>
              </button>
            </div>
          </form>
        </div>
      </template>
    </modal>
  </div>
</template>

<script>
// import ProductModal from './ProductsModal'

import '../../common/table/Table'

import Modal from '../../common/Modal'

export default {
  name: 'product',

  components: {
    Modal
    // "modal-product":ProductModal
  },

  data () {
    return {
      showModal: false,
      requestType: '',

      products : {},
      // form: new Form()

      form: new Form({
        id: '',
        name: '',
        details: '',
        price: '',
        description: ''
      })
    };
  },

  created () {
    this.loadProducts(); // Load the data in product

    Fire.$on('loadProduct',() =>{
      this.loadProducts();
    });

    Fire.$on('editProduct',(product) =>{
      this.form.fill(product);
      this.requestStatus = false;
    });

    Fire.$on('createProduct',() =>{
      this.requestStatus = true;
    });
  },

  methods: {
    modalTrigger(type, product) {
      this.showModal = true
      this.requestStatus = type === 'create' ? true : false

      if(this.requestStatus) {
        Fire.$emit('createProduct')
      } else {
        this.form.reset();
        Fire.$emit('editProduct', product)
      }
    },

    loadProducts() {
      axios.get('/api/admin/products').then(({data}) => (this.products = data.data));
    },

    deleteProduct(id) {
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
          this.form.delete('/api/admin/products/'+ id).then(data => {
            Fire.$emit('loadProduct');
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

    updateProduct() {
      this.$Progress.start();

      this.form.put('/api/admin/products/'+this.form.id)
      .then(() => {
        Fire.$emit('loadProduct');
        this.showModal = false;

        Toast.fire({
          type: 'success',
          title: 'Product edited successfully'
        });
        this.$Progress.finish();
      })
      .catch(() => {
        this.$Progress.fail();
      });
    },

    createProduct() {
      this.$Progress.start();

      this.form.post('/api/admin/products')
      .then(() => {
        Fire.$emit('loadProduct');
        this.showModal = false;

        Toast.fire({
          type: 'success',
          title: 'Product created successfully'
        });
        this.$Progress.finish();
      })
      .catch(() => {
        this.$Progress.fail();
      });
    },

    clearData() {
      this.showModal = false;
      this.form.reset();
    }
  }

}
</script>
