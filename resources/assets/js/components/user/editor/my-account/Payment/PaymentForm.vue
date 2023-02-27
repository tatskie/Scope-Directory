<template>
	<div class="product">

    <div class="form-btn" @click="modalTrigger()">
      <button class="btn-update -withlabel">
        <span>Pay for licence card now</span>
      </button>
    </div>
    <modal
      :title="'Payment'"
      class=" modal-payment"
      v-if="showModal"
      :activate="showModal"
      @activate="showModal = $event"
    >
      <template slot="body">
         <div class="form">
          <form class="form-inner">
            <div class="form-item">
              <label for="card_no">Card no.</label>

              <div class="form-input">
                <input
                  type="number"
                  name="card_no"
                  value=""
                  placeholder="0"
                  id="card_no"
                />
              </div>
              <div class="form-error">
                <!-- <span v-if="form.errors.has('points')">
                    <strong v-text="form.errors.get('points')"></strong>
                </span> -->
              </div>
            </div>


            <div class="form-item">
              <label for="cvc">CVC</label>

              <div class="form-input">
                <input
                  type="number"
                  name="cvc"
                  value=""
                  placeholder="0"
                  id="cvc"
                />
              </div>
              <div class="form-error">
                <!-- <span v-if="form.errors.has('points')">
                    <strong v-text="form.errors.get('points')"></strong>
                </span> -->
              </div>
            </div>

            <div class="form-item">
              <label for="expiry">Expiry</label>

              <div class="form-input">
                <input
                  type="date"
                  name="expiry"
                  value=""
                  placeholder="0"
                  id="expiry"
                />
              </div>
              <div class="form-error">
                <!-- <span v-if="form.errors.has('points')">
                    <strong v-text="form.errors.get('points')"></strong>
                </span> -->
              </div>
            </div>

            <div class="form-btn">
              <button class="btn-create -withlabel">
                <i class="ico-create"></i>
                <span>Submit</span>
              </button>
            </div>
          </form>
        </div>
      </template>
    </modal>
  </div>
</template>

<script>
   // import QuestionModal from './QuestionModal'
  import '../../../../common/table/Table'

  import Modal from '../../../../common/Modal'

    export default {
      components: {
        // "modal-question": QuestionModal,
        Modal
      },

      data () {
        return {
          showModal: false,
          user : [],
          category: {
            specialist_title: '',
            class: ''
          }
        }
      },

      created () {
        
      },

      methods: {
        modalTrigger() {
          this.showModal = true;
        }
      }
    }
</script>