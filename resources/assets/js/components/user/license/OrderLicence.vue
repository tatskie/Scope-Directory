<template>
  <div class="product">
    <div class="btn-update -withlabel" @click="modalTrigger()">
      Order ID Card
    </div>
    <modal
      :title="isPaid ? 'Paid successfully' :'Order ID Card'"
      class="modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="contents-body" v-if="loading">
          <div class="emptylist">
            <img src="/assets/assets/images/loading/loading.gif">
          </div>
        </div>
        <div class="form" v-else>
            <div class="form-item" style="text-align: center;" v-show="!isPaid">
              <h1>Title: {{ category.specialist_title }} {{ user.name }}</h1>
              <h1>PIF: {{ aif.title }}</h1><br>
              <h1>Total Amount: ${{ this.category.fee }}</h1>
              <br>


              <div v-show="confirmShipping">
                <h4 style="text-align: center;">
                  Shipping Details:
                </h4>
                <h4 style="text-align: center;">
                  {{ shipping.last_name }}, {{ shipping.first_name }}
                </h4>
                <h4 style="text-align: center;">
                  {{ shipping.phone_number }}
                </h4>
                <h4 style="text-align: center;">
                  {{ shipping.building }}, {{ shipping.street_address }}, {{ shipping.city }}, {{ shipping.country }}, {{ shipping.zip_code }}
                </h4>
              </div>
              <br>
              <div id="paypal-button-container" v-show="confirmShipping">
                
              </div>

              <div class="form-btn" @click="modalTriggerShipping()" v-show="!confirmShipping">
                <button class="btn-create -withlabel">
                  <i class="ico-create"></i>
                  <span>Shipping Address</span>
                </button>
              </div>

              <modal
                title="Shipping Address"
                class="modal-questionaire"
                v-if="showModalShipping"
                :activate="showModalShipping"
                @activate="showModalShipping = $event"
              >
                <template slot="body">
                  <div class="contents-body" v-if="loading">
                    <div class="emptylist">
                      <img src="/assets/assets/images/loading/loading.gif">
                    </div>
                  </div>
                  <div class="form" v-else>
                      
                      <form class="form-horizontal" @submit.prevent="createShippingAddress" @keydown="shippingForm.errors.clear($event.target.name)" enctype="multipart/form-data">

                      <div class="form-item">
                        <label for="first_name">First Name</label>

                        <div class="form-input">
                          <input
                            v-model="shippingForm.first_name"
                            type="text"
                            name="first_name"
                            value=""
                            placeholder="First Name"
                            id="first_name"
                          />
                        </div>
                        <div class="form-error">
                          <span v-if="shippingForm.errors.has('first_name')">
                              <strong v-text="shippingForm.errors.get('first_name')"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="form-item">
                        <label for="link">Last Name</label>

                        <div class="form-input">
                          <input
                            v-model="shippingForm.last_name"
                            type="text"
                            name="last_name"
                            value=""
                            placeholder="Enter Last Name"
                            id="last_name"
                          />
                        </div>
                        <div class="form-error">
                          <span v-if="shippingForm.errors.has('last_name')">
                              <strong v-text="shippingForm.errors.get('last_name')"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="form-item">
                        <label for="link">Street Address</label>

                        <div class="form-input">
                          <input
                            v-model="shippingForm.street_address"
                            type="text"
                            name="street_address"
                            value=""
                            placeholder="Enter Street Address"
                            id="street_address"
                          />
                        </div>
                        <div class="form-error">
                          <span v-if="shippingForm.errors.has('street_address')">
                              <strong v-text="shippingForm.errors.get('street_address')"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="form-item">
                        <label for="link">Building (optional)</label>

                        <div class="form-input">
                          <input
                            v-model="shippingForm.building"
                            type="text"
                            name="building"
                            value=""
                            placeholder="Enter Building (optional)"
                            id="building"
                          />
                        </div>
                        <div class="form-error">
                          <span v-if="shippingForm.errors.has('building')">
                              <strong v-text="shippingForm.errors.get('building')"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="form-item">
                        <label for="link">City</label>

                        <div class="form-input">
                          <input
                            v-model="shippingForm.city"
                            type="text"
                            name="city"
                            value=""
                            placeholder="Enter City"
                            id="city"
                          />
                        </div>
                        <div class="form-error">
                          <span v-if="shippingForm.errors.has('city')">
                              <strong v-text="shippingForm.errors.get('city')"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="form-item">
                        <label for="link">Country</label>

                        <div class="form-input">
                          <input
                            v-model="shippingForm.country"
                            type="text"
                            name="country"
                            value=""
                            placeholder="Enter Country"
                            id="country"
                          />
                        </div>
                        <div class="form-error">
                          <span v-if="shippingForm.errors.has('country')">
                              <strong v-text="shippingForm.errors.get('country')"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="form-item">
                        <label for="link">Zip Code</label>

                        <div class="form-input">
                          <input
                            v-model="shippingForm.zip_code"
                            type="number"
                            name="zip_code"
                            value=""
                            placeholder="Enter Zip Code"
                            id="zip_code"
                          />
                        </div>
                        <div class="form-error">
                          <span v-if="shippingForm.errors.has('zip_code')">
                              <strong v-text="shippingForm.errors.get('zip_code')"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="form-item">
                        <label for="link">Phone Number</label>

                        <div class="form-input">
                          <input
                            v-model="shippingForm.phone_number"
                            type="text"
                            name="phone_number"
                            value=""
                            placeholder="Enter Phone Number"
                            id="phone_number"
                          />
                        </div>
                        <div class="form-error">
                          <span v-if="shippingForm.errors.has('phone_number')">
                              <strong v-text="shippingForm.errors.get('phone_number')"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="form-btn">
                        <button class="btn-update -withlabel">
                          <i class="ico-update"></i>
                          <span>Save</span>
                        </button>
                      </div>
                    </form>

                  </div>
                </template>
              </modal>

            </div>
            <div style="text-align: center;" v-show="!isPaid">
              <p style="color: #232323;font-style: italic;font-size:14px">
                Upon clicking the checkout button you will be redirected to PayPal for payment finalization.
                <br>You will then be returned to the main page where you may view transaction receipt.<br>
                If you experience any problems please email <span style="color: #00a0e3;">support@scope.directory</span>
              </p>
            </div>
            <div v-show="isPaid">
              <div style="text-align:center">
                <i class="fa fa-check-circle" style="font-size:52px; color:#39c8df">
                </i>
              </div>
              <br>
              <h2 style="text-align: center;">
                Thank you for your order!
              </h2>
              <br>
              <h4 style="text-align: center;">
                An email confirmation is sent to your registered email detailing the suceeding procedure.
              </h4>
              <br>
              <h4 style="text-align: center;">
                <a href="#" @click="myBilling" style="color:#39c8df;">Billing Details</a>
              </h4>
            </div>
        </div>
      </template>
    </modal>
  </div>


</template>

<script>
   // import QuestionModal from './QuestionModal'
  import '../../common/table/Table';
  import Vue from 'vue';
  import Modal from '../../common/Modal';
  // import PayPal from 'vue-paypal-checkout';

    export default {
      components: {
        // "modal-question": QuestionModal,
        Modal
        // PayPal
      },

      data () {
        return {
          showModal: false,
          showModalShipping: false,
          isPaid: false,
          confirmShipping: false,
          loading: true,
          credentials: {
            sandbox: 'ASjHEAFSQdXc_nkAyJJy1Hrrpk6MrOUOqy769tQTZDyPgx5spG9_22V23bnzlOJ-4Y_AU8uC3SpDKxL4',
            production: 'ARte-5uRbQE8EDdOJz_PDPoBvfx4LYAUnaCgycMUMIZVM9kXc_msIY4tSj9OCpIuQqYaAL1w2cSul997'
          },
          shipping: [],
          user : [],
          category: [],
          aif: [],
          form : new Form({
            user_id: '',
            aif_id: '',
            academia_id: ''
          }),
          shippingForm : new Form({
            first_name: '',
            last_name: '',
            street_address: '',
            building: '',
            city: '',
            country: '',
            zip_code: '',
            phone_number: ''
          })
        }
      },

      created() {
        this.loadProfile(); // Load the user profile
      },  

      methods: {
        loadProfile() {
            axios.get('/api/academia/profile').then(({data}) => (
              this.user = data,
              this.category = data.card.academia_category,
              this.aif = data.card.aif,
              // console.log(data.receipts.length);
              this.isPaid = data.receipts.length == 0 ? false : true       
              ));
        },

        loadShippingAddress() {
            axios.get('/api/academia/shipping-address').then(({data}) => (
              this.shipping = data
              ));
        },

        myBilling() {
          this.showModal = false;
          this.$router.push('/academia/billing/').catch(err => {});
        },  

        modalTrigger() {
          swal.fire({
          title: 'Please confirm that your data is correct?',
          text: "You won't be able to revert this!",
          type: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, correct!'
          }).then((result) => {
            if (result.value) {
              this.showModal = true;
              this.form.user_id = this.user.id;
              this.form.academia_id = this.category.id;
              this.form.aif_id = this.aif.id;

              if (!this.isPaid) {
                this.loading = false;
                const script = document.createElement("script");
                script.src =
                  "https://www.paypalobjects.com/api/checkout.js";
                script.addEventListener("load", this.setLoaded);
                document.body.appendChild(script);
              }

              this.loading = false;
            }
          })
        },

        modalTriggerShipping() {
          this.showModalShipping = true;
        },

        setLoaded: function() {
            paypal.Button.render({
                env: 'production',
                client: {
                    sandbox: this.credentials.sandbox,
                    production: this.credentials.production
                },

                locale: 'en_US',
                style: {
                    size: 'large',
                    color: 'blue',
                    shape: 'pill',
                },

                commit: true,

                payment: (data, actions) => {
                    return actions.payment.create({
                        transactions: [{
                            description: this.category.specialist_title,
                            amount: {
                                total: this.category.fee,
                                currency: 'USD'
                            }
                        }]
                    });
                },

                onAuthorize: async (data, actions) => {
                    this.loading = true;
                    this.paymentReceipt();
                    actions.order.capture();
                    this.loading = false;
                    this.isPaid = true;
                    Toast.fire({
                      type: 'success',
                      title: 'Paid successfully',
                      duration : 10000
                    });
                  // return actions.payment.execute().then(function() {
                  //   this.loading = true;
                  //   this.paymentReceipt();
                  // });
                    // this.loading = true;
                    // this.paymentReceipt();
                    // const order = await actions.order.capture();
                },
                onError: err => {
                  console.log(err);
                }
            }, '#paypal-button-container');

            console.log('notification mounted');
        },

        paymentReceipt() {
          this.form.post('/api/academia/receipt')
            .then(() => {
            
            })
            .catch(() => {
              this.$Progress.fail();
            });
        },

        createShippingAddress() {
          this.shippingForm.post('/api/academia/shipping-address')
            .then(()=>{
              Toast.fire({
                  type: 'success',
                  title: 'Shipping Address Added Successfully!'
              });
              
              this.loadShippingAddress(); // Load the shipping address
              this.confirmShipping = true;
              this.showModalShipping = false;
            })
            .catch(()=>{
              Toast.fire({
                type: 'error',
                title: 'Whoops!',
                text: 'Something went wrong!'
              });
            });
        }
      }
    }
</script>