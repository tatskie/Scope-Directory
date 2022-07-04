<template>
	<div class="choice">
    <a href="#" @click="modalTrigger()">Choices</a>
    <modal
      :title="'Followup Choices.'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form" v-if="loading" style="text-align: center;">
          <img src="/assets/assets/images/loading/loading.gif" width="250" height="200">
        </div>
        <div v-else>
          <div v-if="choices.length == 0">
            <h1>Please Create Choices</h1>
            <form  @submit.prevent="createFollowupChoices()" @keydown="form.errors.clear($event.target.name)">
                <table>
                <tr>
                  <th>Label</th>
                  <th>Points</th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                    <td>
                      <input type="text" name="label" ref="label" @change="nextFocus" v-model="form.label">
                      <div class="form-error">
                        <span v-if="form.errors.has('label')">
                            <strong v-text="form.errors.get('label')"></strong>
                        </span>
                      </div>
                    </td>
                    <td>
                      <input type="number" name="points" ref="points" v-model="form.points">
                      <div class="form-error">
                        <span v-if="form.errors.has('points')">
                            <strong v-text="form.errors.get('points')"></strong>
                        </span>
                      </div>
                    </td>
                    <td>
                      <button class="btn-create -withlabel" :disabled="form.errors.any()">
                        <i class="ico-create"></i>
                        <span>Submit</span>
                      </button>
                    </td>
                    <td>
                      <button class="btn-delete -withlabel" @click="closeForm">
                        <i class="ico-delete"></i>
                        <span>Close</span>
                      </button>
                    </td>
                </tr>
                </tr>
              </table>
            </form>
          </div>
          <div v-else>
            <h1>Choices</h1>
              <form  @submit.prevent="requestStatus ? createFollowupChoices() : updateFollowupChoices()" @keydown="form.errors.clear($event.target.name)">
                <table>
                <tr>
                  <th>Label</th>
                  <th>Points</th>
                  <th></th>
                  <th></th>
                </tr>
                <tr v-if="showForm">
                    <td>
                      <input type="text" name="label" ref="label" @change="nextFocus" v-model="form.label">
                      <div class="form-error">
                        <span v-if="form.errors.has('label')">
                            <strong v-text="form.errors.get('label')"></strong>
                        </span>
                      </div>
                    </td>
                    <td>
                      <input type="number" name="points" ref="points" v-model="form.points">
                      <div class="form-error">
                        <span v-if="form.errors.has('points')">
                            <strong v-text="form.errors.get('points')"></strong>
                        </span>
                      </div>
                    </td>
                    <td>
                      <button class="btn-create -withlabel" :disabled="form.errors.any()" v-show="requestStatus">
                        <i class="ico-create"></i>
                        <span>Submit</span>
                      </button>

                      <button class="btn-update -withlabel" :disabled="form.errors.any()" v-show="!requestStatus">
                        <i class="ico-update"></i>
                        <span>Update</span>
                      </button>
                    </td>
                    <td>
                      <button class="btn-delete -withlabel" @click="closeForm">
                        <i class="ico-delete"></i>
                        <span>Close</span>
                      </button>
                    </td>
                </tr>
                <tr v-for="(choice, ruleID) in choices" :key="choice.id">
                  <td>{{ choice.label }}</td>
                  <td>{{ choice.points }}</td>
                  <td>
                    <div class="btn-edit -icon" @click="choiceForm('edit', choice)">
                      <i class="ico-edit"></i>
                    </div>
                  </td>
                  <td>
                    <div class="btn-delete -icon" @click="deleteChoice(choice)">
                      <i class="ico-delete"></i>
                    </div>
                  </td>
                </tr>
              </table>
            </form>
          </div>
          <br>
          <br>
          <div class="form-btn">
              <button class="btn-create -withlabel" @click="choiceForm('create')">
                <i class="ico-create"></i>
                <span>Create Choices</span>
              </button>
            </div>
        </div>
      </template>
    </modal>
  </div>


</template>

<script>
  import Modal from '../../../../common/Modal';

    export default {

      props: ['followup'],

      components: {
        Modal
      },

      data () {
        return {
          showModal: false,
          loading: true,
          requestType: '',
          showForm: false,
          choices: [],
          form: new Form({
            id: '',
            label: '',
            followup_id: '',
            points: ''
          })
        }
      },

      created() {
        this.loadChoices();

        Fire.$on('loadChoices',() =>{
              this.loadChoices();
        });

        Fire.$on('editFollowupChoices',(choice) =>{
          this.form.fill(choice);
          this.form.followup_id = this.followup.id
          this.requestStatus = false;
        });

        Fire.$on('createFollowupChoices',() =>{
              this.requestStatus = true;
              this.form.reset();
              this.form.followup_id = this.followup.id
        });

      },

      methods: {
        modalTrigger() {
          this.showModal = true;
          Fire.$emit('createFollowupChoices');

          if (this.choices.length == 0) {
            this.$nextTick(function () {
              this.$refs.label.focus()
            })
          }
        },

        loadChoices() {
          axios.get('/api/admin/followup-question/'+this.followup.id).then(response => {
            this.choices = response.data.question_choices
            this.loading = false
          });
        },

        choiceForm(type, choice) {
          this.showForm = true
          this.requestStatus = type === 'create' ? true : false
          this.$nextTick(function () {
              this.$refs.label.focus()
          })

          if(this.requestStatus) {
            this.form.reset();
            Fire.$emit('createFollowupChoices');
          } else {
            this.form.reset();
            Fire.$emit('editFollowupChoices', choice);
          }
        },

        closeForm() {
          this.showForm = false
          this.form.reset();
        },

        nextFocus() {
          this.$nextTick(function () {
              this.$refs.points.focus()
          })
        },

        createFollowupChoices() {
          this.form.post('/api/admin/followup-choices')
            .then(() => {
              this.showForm = false
              Fire.$emit('loadChoices');
              Toast.fire({
                type: 'success',
                title: 'Choice added!'
              });
            })
            .catch(() => {
              Toast.fire({
                  type: 'error',
                  title: 'Whoops! Something went wrong!'
                });
            });
        },

        updateFollowupChoices() {
          this.form.put('/api/admin/followup-choices/'+this.form.id)
            .then(() => {
              this.showForm = false
              Fire.$emit('loadChoices');
              Toast.fire({
                type: 'success',
                title: 'Followup Choice updated!'
              });
            })
            .catch(() => {
              Toast.fire({
                  type: 'error',
                  title: 'Whoops! Something went wrong!'
                });
            });
        },

        deleteChoice(choice) {
          this.form.fill(choice);

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
              this.form.delete('/api/admin/followup-choices/'+ this.form.id).then(response => {
                  this.showForm = false
                  Fire.$emit('loadChoices');
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

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>