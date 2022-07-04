<template>
	<div class="questionaire" style="height: 480px;">
	    <div class="contents-head">
	      <h2 style="margin-right:20px">Billing</h2>
	    </div>

		<div id="contents-body">
		      <div class="emptylist" v-if="receipts.length == 0">
		        <i class="ico-empty-folder"></i>
		      </div>

		      <tbl v-else>
		        <template slot="head">
		          <tbl-td class="receipt-no">
		            receipt no.
		          </tbl-td>

		          <tbl-td class="licence-category">
		            licence category
		          </tbl-td>

		          <tbl-td class="aif">
		            aif
		          </tbl-td>

		          <tbl-td class="payment-date">
		            payment date
		          </tbl-td>
				  
		          <tbl-td class="expiry">
		            expiry date
		          </tbl-td>
				  
		          <tbl-td class="fee">
		            Amount
		          </tbl-td>

		          <tbl-td class="actions">
				  	
		          </tbl-td>
		        </template>

		        <template slot="body">
		          <tbl-row v-for="receipt in receipts" :key="receipt.id">
		            <tbl-td class="receipt-no">
		              {{ receipt.number }}
		            </tbl-td>

		            <tbl-td class="licence-category">
		              {{ receipt.academia_category.specialist_title }}
		            </tbl-td>

		            <tbl-td class="aif">
		              {{ receipt.aif.title }}
		            </tbl-td>

		            <tbl-td class="payment-date">
		              {{ receipt.created_at | formatDate }}
		            </tbl-td>
					
		            <tbl-td class="expiry">
		              {{ receipt.expire_at | formatDate }}
		            </tbl-td>

		            <tbl-td class="fee">
		              ${{ receipt.academia_category.fee }}
		            </tbl-td>

		            <tbl-td class="actions">
		            	<a href="#" @click="downloadReceipt(receipt.id)">
			            	<i class="fa fa-download" style="font-size:18px;color:#00a0e3;"></i>
							<span style="color: #00a0e3;text-decoration: underline;"> Download Receipt</span>
						</a>
		            </tbl-td>
		          </tbl-row>
		        </template>

		        <template slot="footer">

		        </template>
		      </tbl>

		</div>	
	 </div>
</template>

<script>
  import '../../common/table/Table';

    export default {
      components: {

      },

      data () {
        return {
          loading: true,
          receipts : [],
        }
      },

      created() {
        this.loadReceipts(); // Load the user receipts
      },  

      methods: {
        loadReceipts() {
            axios.get('/api/academia/receipts').then(({data}) => (this.receipts = data));
        },

        downloadReceipt(id) {
        	// axios.get('/api/teacher/download-receipt');
        	axios({
			  url: '/api/academia/download-receipt/' + id,
			  method: 'GET',
			  responseType: 'blob', // important
			}).then((response) => {
			  const url = window.URL.createObjectURL(new Blob([response.data]));
			  const link = document.createElement('a');
			  link.href = url;
			  link.setAttribute('download', 'receipt.pdf');
			  document.body.appendChild(link);
			  link.click();
			});
        }
      }
    }
</script>