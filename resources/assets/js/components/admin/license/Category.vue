<template>
  <div class="category">
    <div class="contents-head">
      <h2><span style="margin-right:20px">Categories</span></h2>

      <div class="btn-create -withlabel" @click="modalTrigger('create')">
        <i class="ico-create"></i>
        <span>Create</span>
      </div>
    </div>

    <div class="contents-body">
      <div class="emptylist" v-if="categories.length == 0">
        <i class="ico-empty-folder"></i>
      </div>

      <tbl v-else>
        <template slot="head">
          <tbl-td class="number">
            Number
          </tbl-td>

          <tbl-td class="specialist-title" style="width: 25%;">
            Category Title
          </tbl-td>

          <tbl-td class="class">
            Class
          </tbl-td>

          <tbl-td class="criteria-notes">
            Criteria<br>Notes
          </tbl-td>

          <tbl-td class="points-minimum">
            Points<br>Minimum
          </tbl-td>

          <tbl-td class="points-maximum">
            Points<br>Maximum
          </tbl-td>

          <tbl-td class="fee">
            Fee
          </tbl-td>

          <tbl-td class="shipping">
            Shipping
          </tbl-td>

          <tbl-td class="licence-count">
            licence<br>count
          </tbl-td>

          <tbl-td class="actions">

          </tbl-td>
        </template>

        <template slot="body">
          <tbl-row v-for="category in categories" :key="category.id">
            <tbl-td class="number">
              {{ category.number }}
            </tbl-td>

            <tbl-td class="specialist-title">
              {{ category.specialist_title }}
            </tbl-td>

            <tbl-td class="class">
              {{ category.class }}
            </tbl-td>

            <tbl-td class="criteria-notes">
              {{ category.criteria_notes }}
            </tbl-td>

            <tbl-td class="points-minimum">
              {{ category.points_minimum }}
            </tbl-td>

            <tbl-td class="points-maximum">
              {{ category.points_maximum }}
            </tbl-td>

            <tbl-td class="fee">
              {{ category.fee }}
            </tbl-td>

            <tbl-td class="shipping">
              {{ category.shipping }}
            </tbl-td>

            <tbl-td class="licence-count">
              {{ category.cards.length }}
            </tbl-td>

            <tbl-td class="actions">
              <div class="btn-edit -icon" @click="modalTrigger('edit', category)"><i class="ico-edit"></i></div>
              <div class="btn-delete -icon" @click="deleteProduct(category.id)"><i class="ico-delete"></i></div>
            </tbl-td>
          </tbl-row>
        </template>

        <template slot="footer">

        </template>
      </tbl>
    </div>


    <modal
      :title="requestStatus ? 'Add New Licence Category' : 'Edit Licence Category'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-horizontal" @submit.prevent="requestStatus ? createCategory() : updateCategory()" @keydown="form.errors.clear($event.target.name)">
            <div class="form-item">
              <label for="number">Number</label>

              <div class="form-input">
                <input
                  type="number"
                  name="number"
                  value=""
                  placeholder="Number"
                  v-model="form.number"
                  readonly="true"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('number')">
                    <strong v-text="form.errors.get('number')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="specialist_title">Specialist Title</label>

              <div class="form-input">
                <input
                  type="text"
                  name="specialist_title"
                  value=""
                  placeholder="Specialist Title"
                  v-model="form.specialist_title"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('specialist_title')">
                    <strong v-text="form.errors.get('specialist_title')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="class">Class</label>

              <div class="form-input">
                <input
                  type="text"
                  name="class"
                  value=""
                  placeholder="class"
                  v-model="form.class"
                  readonly="true"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('class')">
                    <strong v-text="form.errors.get('class')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="criteria_notes">Criteria Notes</label>

              <div class="form-input">
                <input
                  type="text"
                  name="criteria_notes"
                  value=""
                  placeholder="Criteria Notes"
                  v-model="form.criteria_notes"
                />
              </div>

              <div class="form-error">
                <span v-if="form.errors.has('criteria_notes')">
                    <strong v-text="form.errors.get('criteria_notes')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="points_minimum">Points Minimum</label>

              <div class="form-input">
                <input
                  type="text"
                  name="points_minimum"
                  value=""
                  placeholder="Points Minimum"
                  v-model="form.points_minimum"
                />
              </div>

              <div class="form-error">
                <span v-if="form.errors.has('points_minimum')">
                    <strong v-text="form.errors.get('points_minimum')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="points_maximum">Points Maximum</label>

              <div class="form-input">
                <input
                  type="text"
                  name="points_maximum"
                  value=""
                  placeholder="Points Maximum"
                  v-model="form.points_maximum"
                />
              </div>

              <div class="form-error">
                <span v-if="form.errors.has('points_maximum')">
                    <strong v-text="form.errors.get('points_maximum')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="fee">Fee</label>

              <div class="form-input">
                <input
                  type="text"
                  name="fee"
                  value=""
                  placeholder="Fee"
                  v-model="form.fee"
                />
              </div>

              <div class="form-error">
                <span v-if="form.errors.has('fee')">
                    <strong v-text="form.errors.get('fee')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="shipping">Shipping</label>

              <div class="form-input">
                <input
                  type="text"
                  name="shipping"
                  value=""
                  placeholder="Shipping"
                  v-model="form.shipping"
                />
              </div>

              <div class="form-error">
                <span v-if="form.errors.has('shipping')">
                    <strong v-text="form.errors.get('shipping')"></strong>
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
  name: 'category',

  components: {
    Modal
    // "modal-product":ProductModal
  },

  data () {
    return {
      showModal: false,
      requestType: '',

      categories : {},
      // form: new Form()

      form: new Form({
        id: '',
        number: '',
        specialist_title: '',
        class: '',
        criteria_notes: '',
        points_minimum: '',
        points_maximum: '',
        fee: '',
        shipping: ''
      })
    };
  },

  created () {
    this.loadCategories(); // Load the data in category

    Fire.$on('loadCategories',() =>{
      this.loadCategories();
    });

    Fire.$on('editCategory',(category) =>{
      this.form.fill(category);
      this.requestStatus = false;
    });

    Fire.$on('createCategory',() =>{
      this.form.reset();
      axios.get('/api/admin/license-categories').then(({data}) => (
        this.form.number = Math.max(...Object.keys(data).map(key => data[key].number)) + 1,
        this.form.class = Math.max(...Object.keys(data).map(key => data[key].class)) + 1
      ));
      this.requestStatus = true;
    });
  },

  methods: {
    modalTrigger(type, category) {
      this.showModal = true
      this.requestStatus = type === 'create' ? true : false

      if(this.requestStatus) {
        Fire.$emit('createCategory')
      } else {
        this.form.reset();
        Fire.$emit('editCategory', category)
      }
    },

    loadCategories() {
      axios.get('/api/admin/license-categories').then(({data}) => (this.categories = data));
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
          this.form.delete('/api/admin/license-categories/'+ id).then(data => {
            Fire.$emit('loadCategories');
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

    updateCategory() {
      this.$Progress.start();

      this.form.put('/api/admin/license-categories/'+this.form.id)
      .then(() => {
        Fire.$emit('loadCategories');
        this.showModal = false;

        Toast.fire({
          type: 'success',
          title: 'Category edited successfully'
        });
        this.$Progress.finish();
      })
      .catch(() => {
        this.$Progress.fail();
      });
    },

    createCategory() {
      this.$Progress.start();

      this.form.post('/api/admin/license-categories')
      .then(() => {
        Fire.$emit('loadCategories');
        this.showModal = false;

        Toast.fire({
          type: 'success',
          title: 'Category created successfully'
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
