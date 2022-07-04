<template>
  <div class="product">
    <div class="contents-head">
      <h2><span style="margin-right:20px">Teacher Impact Factor (TIF) Categories</span></h2>

      <div class="btn-create -withlabel" @click="modalTrigger('create')">
        <i class="ico-create"></i>
        <span>Create</span>
      </div>
    </div>

    <div class="contents-body">
      <div class="emptylist" v-if="tifs.length == 0">
        <i class="ico-empty-folder"></i>
      </div>

      <tbl v-else>
        <template slot="head">
          <tbl-td class="number">
            Number
          </tbl-td>

          <tbl-td class="title">
            TIF Title
          </tbl-td>

          <tbl-td class="points-minimum">
            Points Minimum
          </tbl-td>

          <tbl-td class="points-maximum">
            Points Maximum
          </tbl-td>

          <tbl-td class="actions">

          </tbl-td>
        </template>

        <template slot="body">
          <tbl-row v-for="tif in tifs" :key="tif.id">
            <tbl-td class="number">
              {{ tif.number }}
            </tbl-td>

            <tbl-td class="title">
              {{ tif.title }}
            </tbl-td>

            <tbl-td class="points-minimum">
              {{ tif.points_minimum }}
            </tbl-td>

            <tbl-td class="points-maximum">
              {{ tif.points_maximum }}
            </tbl-td>

            <tbl-td class="actions">
              <div class="btn-edit -icon" @click="modalTrigger('edit', tif)"><i class="ico-edit"></i></div>
              <div class="btn-delete -icon" @click="deleteTIF(tif.id)"><i class="ico-delete"></i></div>
            </tbl-td>
          </tbl-row>
        </template>

        <template slot="footer">

        </template>
      </tbl>
    </div>


    <modal
      :title="requestStatus ? 'Add New Teacher Impact Factor' : 'Edit Teacher Impact Factor'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-horizontal" @submit.prevent="requestStatus ? createTIF() : updateTIF()" @keydown="form.errors.clear($event.target.name)">
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
              <label for="title">Title</label>

              <div class="form-input">
                <input
                  type="text"
                  name="title"
                  value=""
                  placeholder="Title"
                  v-model="form.title"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('specialist_title')">
                    <strong v-text="form.errors.get('specialist_title')"></strong>
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

      tifs : {},
      // form: new Form()

      form: new Form({
        id: '',
        number: '',
        title: '',
        points_minimum: '',
        points_maximum: ''
      })
    };
  },

  created () {
    this.loadTIF(); // Load the data in category

    Fire.$on('loadTIF',() =>{
      this.loadTIF();
    });

    Fire.$on('editTIF',(tif) =>{
      this.form.fill(tif);
      this.requestStatus = false;
    });

    Fire.$on('createTIF',() =>{
      this.form.reset();
      axios.get('/api/admin/teacher-impact-factor').then(({data}) => (
        this.form.number = Math.max(...Object.keys(data).map(key => data[key].number)) + 1
      ));
      this.requestStatus = true;
    });
  },

  methods: {
    modalTrigger(type, tif) {
      this.showModal = true
      this.requestStatus = type === 'create' ? true : false

      if(this.requestStatus) {
        Fire.$emit('createTIF')
      } else {
        this.form.reset();
        Fire.$emit('editTIF', tif)
      }
    },

    loadTIF() {
      axios.get('/api/admin/teacher-impact-factor').then(({data}) => (this.tifs = data));
    },

    deleteTIF(id) {
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
          this.form.delete('/api/admin/teacher-impact-factor/'+ id).then(data => {
            Fire.$emit('loadTIF');
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

    updateTIF() {
      this.$Progress.start();

      this.form.put('/api/admin/teacher-impact-factor/'+this.form.id)
      .then(() => {
        Fire.$emit('loadTIF');
        this.showModal = false;

        Toast.fire({
          type: 'success',
          title: 'Teacher Impact Factor edited successfully'
        });
        this.$Progress.finish();
      })
      .catch(() => {
        this.$Progress.fail();
      });
    },

    createTIF() {
      this.$Progress.start();

      this.form.post('/api/admin/teacher-impact-factor')
      .then(() => {
        Fire.$emit('loadTIF');
        this.showModal = false;

        Toast.fire({
          type: 'success',
          title: 'Teacher Impact Factor created successfully'
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
