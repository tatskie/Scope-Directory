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
              <div id="paypal-button-container"></div>
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
          isPaid: false,
          loading: true,
          credentials: {
            sandbox: 'ASjHEAFSQdXc_nkAyJJy1Hrrpk6MrOUOqy769tQTZDyPgx5spG9_22V23bnzlOJ-4Y_AU8uC3SpDKxL4',
            production: 'ARte-5uRbQE8EDdOJz_PDPoBvfx4LYAUnaCgycMUMIZVM9kXc_msIY4tSj9OCpIuQqYaAL1w2cSul997'
          },
          user : [],
          category: [],
          aif: [],
          form : new Form({
            user_id: '',
            aif_id: '',
            academia_id: ''
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
        }
      }
    }
</script>