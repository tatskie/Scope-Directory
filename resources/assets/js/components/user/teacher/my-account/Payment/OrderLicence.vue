<template>
	<div class="product">
    <div class="btn-update -withlabel" @click="modalTrigger()">
      Order ID card
    </div>
    <modal
      :title="'Order ID card'"
      class=" modal-questionaire"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
        <div class="form">
            <div class="form-item" style="text-align: center;">
              <h1>Title: {{ category.specialist_title }} {{ user.name }}</h1>
              <h1>PIF: {{ aif.title }}</h1>
              <h1>Total Payment: {{ this.category.fee }}</h1>
              <br>
              <div id="paypal-button-container"></div>
            </div>
        </div>
      </template>
    </modal>
  </div>


</template>

<script>
   // import QuestionModal from './QuestionModal'
  import '../../../common/table/Table';
  import Vue from 'vue';
  import Modal from '../../../common/Modal';
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
          credentials: {
            sandbox: 'AbvJHoo6LtKlzly0BIITu52iNeR1Eh8MO3k-zhoTb05Y1NYFGqPmGCD0qonN_pJAbcACdDPy9D8KLKg2',
            production: 'Ae3ms7uTgaBud3bC-e3fpnNlaj0RV7BbsbA_JSLppMxcKHOTPIMN2WVjhTC_sX7KlaedNgvk4bt74rxK'
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
            axios.get('/api/teacher/profile').then(({data}) => (
              this.user = data,
              this.category = data.card.academia_category,
              this.aif = data.card.aif
              ));
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
              this.form.category_id = this.category.id;
              this.form.tif_id = this.tif.id;

              const script = document.createElement("script");
              script.src =
                "https://www.paypalobjects.com/api/checkout.js";
              script.addEventListener("load", this.setLoaded);
              document.body.appendChild(script);
            }
          })
        },

        setLoaded: function() {
            paypal.Button.render({
                env: 'sandbox',
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
                },
                onError: err => {
                  console.log(err);
                }
            }, '#paypal-button-container');

            console.log('notification mounted');
        },

        paymentReceipt() {
          this.form.post('/api/teacher/receipt')
            .then(() => {
            })
            .catch(() => {
              this.$Progress.fail();
            });
        }
      }
    }
</script>