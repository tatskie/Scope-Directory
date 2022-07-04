<template>
  <div class="user">
    <div class="contents-head">
      <h2><span style="margin-right:20px">Users</span></h2>

      <div class="btn-create -withlabel" @click="modalTrigger('create')">
        <i class="ico-create"></i>
        <span>Create Corporate User</span>
      </div>
    </div>

    <div class="contents-body">
      <div class="emptylist" v-if="users.length == 0">
        <i class="ico-empty-folder"></i>
      </div>

      <tbl v-else>
        <template slot="head">
          <tbl-td class="name" style="width:18%">
            name
          </tbl-td>

          <tbl-td class="email" style="width:18%">
            email
          </tbl-td>

          <tbl-td class="username">
            username
          </tbl-td>

          <tbl-td class="score">
            score
          </tbl-td>

          <tbl-td class="category" style="width:18%">
            category
          </tbl-td>

          <tbl-td class="tif">
            tif
          </tbl-td>

          <tbl-td class="account-type">
            account<br>type
          </tbl-td>

          <tbl-td class="actions">

          </tbl-td>
        </template>

        <template slot="body">
          <tbl-row v-for="user in users.data" :key="user.id">
            <tbl-td class="name">
              {{ user.name | upText}}
            </tbl-td>

            <tbl-td class="email">
              {{ user.email }}
            </tbl-td>

            <tbl-td class="username">
              {{ user.username }}
            </tbl-td>

            <tbl-td class="score" v-if="user.answer_score">
              {{ user.answer_score.total_points }}
            </tbl-td>

            <tbl-td class="score" v-else>
              no record
            </tbl-td>

            <tbl-td class="category" v-if="user.card">
              <p v-if="user.card.license_category">
                {{ user.card.license_category.specialist_title }}
              </p>
              <p v-else>
                no record
              </p>
            </tbl-td>

            <tbl-td class="category" v-else-if="user.answer_score">
              no category
            </tbl-td>

            <tbl-td class="category" v-else>
              no record
            </tbl-td>

            <tbl-td class="category" v-if="user.card">
              <p v-if="user.card.tif">
                {{ user.card.tif.title }}
              </p>
              <p v-else>
                no record
              </p>
            </tbl-td>

            <tbl-td class="category" v-else-if="user.answer_score">
              no tif
            </tbl-td>

            <tbl-td class="category" v-else>
              no record
            </tbl-td>

            <tbl-td class="account-type" v-if="user.roles">
              {{ user.roles[0].name }}
            </tbl-td>

            <tbl-td class="account-type" v-else>
              no account type.
            </tbl-td>

            <tbl-td class="actions">
              <div class="btn-delete -icon" @click="deleteUser(user.id)"><i class="ico-delete"></i></div>
            </tbl-td>
          </tbl-row>
        </template>

        <template slot="footer">
          <pagination :data="users" @pagination-change-page="getResults">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
          </pagination>
        </template>
      </tbl>
    </div>


    <modal
      :title="'Add New User'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
          <form class="form-horizontal" @submit.prevent="createUser()" @keydown="form.errors.clear($event.target.name)">
            <div class="form-item">
              <label for="points">Name</label>

              <div class="form-input">
                <input
                  type="text"
                  name="name"
                  value=""
                  placeholder="name"
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
              <label for="points">email</label>

              <div class="form-input">
                <input
                  type="text"
                  name="email"
                  value=""
                  placeholder="email"
                  v-model="form.email"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('email')">
                    <strong v-text="form.errors.get('email')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="points">username</label>

              <div class="form-input">
                <input
                  type="text"
                  name="username"
                  value=""
                  placeholder="username"
                  v-model="form.username"
                />
              </div>
              <div class="form-error">
                <span v-if="form.errors.has('username')">
                    <strong v-text="form.errors.get('username')"></strong>
                </span>
              </div>
            </div>

            <div class="form-item">
              <label for="type">Role</label>

              <div class="form-input -select">
                <select class="" name="type">
                  <option value="corporate" selected>Corporate</option>
                </select>
              </div>
            </div>
            <div class="form-btn">
              <button class="btn-create -withlabel" :disabled="form.errors.any()">
                <i class="ico-create"></i>
                <span>Create</span>
              </button>
            </div>
          </form>
        </div>
      </template>
    </modal>
  </div>
</template>

<script>
import '../../common/table/Table'

import Modal from '../../common/Modal'

export default {
  name: 'user',

  components: {
    Modal
  },

  data () {
    return {
      showModal: false,
      requestType: '',

      users : {},
      category : {},
      // form: new Form()

      form: new Form({
        id: '',
        name: '',
        email: '',
        username: '',
      })
    };
  },

  created () {
    this.loadUsers(); // Load the data in product

    Fire.$on('loadUser',() =>{
      this.loadUsers();
    });

    Fire.$on('editUser',(user) =>{
      this.form.fill(user);
      this.requestStatus = false;
    });

    Fire.$on('createUser',() =>{
      this.requestStatus = true;
    });
  },

  methods: {
    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      axios.get('/api/admin/users?page=' + page)
        .then(response => {
          this.users = response.data;
        });
    },

    modalTrigger(type, user) {
      this.showModal = true
      this.requestStatus = type === 'create' ? true : false

      if(this.requestStatus) {
        this.form.reset();
        Fire.$emit('createUser')
      } else {
        this.form.reset();
        Fire.$emit('editUser', user)
      }
    },

    loadUsers() {
      axios.get('/api/admin/users').then(({data}) => (this.users = data));
    },

    deleteUser(id) {
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
          this.form.delete('/api/admin/users/'+ id).then(data => {
            Fire.$emit('loadUser');
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

    createUser() {
      this.$Progress.start();

      this.form.post('/api/admin/users')
      .then(() => {
        Fire.$emit('loadUser');
        this.showModal = false;

        Toast.fire({
          type: 'success',
          title: 'User created successfully'
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
