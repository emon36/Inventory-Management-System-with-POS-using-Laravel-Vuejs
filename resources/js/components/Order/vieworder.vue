<template>
  
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="d-sm-flex justify-content-between mb-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <router-link :to="{ name: 'Home' }">Dashboard</router-link>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              <router-link :to="{ name: 'order' }">Order List</router-link>
            </li>
            <li class="breadcrumb-item active">Order Details</li>
          </ol>

         
        </div>

        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-12">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mt-4">Order Details</h1>
                </div>
                <div class="text-right mb-3 mr-2">
                 <button @click="print" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                </div>

<div id="printInvoice">
                <div class="row">
                  <div class="col-lg-6 mb-4"> 
                    <!-- Simple Tables -->
                    <div class="card">
                      <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                      >
                        <h6 class="m-0 font-weight-bold text-primary">Customer Information</h6>
                      </div>
                      <ul class="list-group">
  <li class="list-group-item"> <b> Name: </b> {{orders.name}} </li>
  <li class="list-group-item"> <b> Phone: </b> {{orders.vat}} </li>
  <li class="list-group-item"><b> Address: </b> {{orders.address}}</li>
  <li class="list-group-item"><b> Date: </b> {{orders.order_date}}</li>
  <li class="list-group-item"><b> Paid By: </b> {{orders.payBy}}</li>
</ul>
                    
                      <div class="card-footer"></div>
                    </div>
                  </div>

                  <div class="col-lg-6 mb-4">
                    <!-- Simple Tables -->
                    <div class="card">
                      <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                      >
                        <h6 class="m-0 font-weight-bold text-primary">Purchase Details</h6>
                      </div>
                      
                          <ul class="list-group">
  <li class="list-group-item"> <b> Sub Total: </b> {{orders.sub_total}} </li>
  <li class="list-group-item"> <b> VAT: </b> {{orders.vat}}% </li>
  <li class="list-group-item"><b> Total: </b> {{orders.sub_total}}</li>
  <li class="list-group-item"><b> Pay Amount: </b> {{orders.paid}}</li>
  <li class="list-group-item"><b> Due Amount: </b> {{orders.due}}</li>
</ul>
             <div class="card-footer"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 mb-4">
                    <!-- Simple Tables -->
                    <div class="card">
                      <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                      >
                        <h6 class="m-0 font-weight-bold text-primary">Products Details</h6>
                      </div>
                   <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="detail in details" :key="detail.id">
                        <td>{{detail.product_name}}</td>
                        <td>{{detail.product_code}}</td>
                        
                        <td>{{detail.product_quantity}}</td>
                        <td>{{detail.product_price}}</td>
                        <td>{{detail.sub_total}}</td>

                      </tr>
                      
                      
                    </tbody>
                  </table>
                </div>
                      <div class="card-footer"></div>
                    </div>
                  </div>
                </div>
</div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
</template>

<script>
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "/" });
    }
  },
  data() {
    return {
      errors: {},
      orders: {},
      details: {},
    };
  },

  methods: {
    print() {
     this.$htmlToPaper('printInvoice');
    }

  },

  created() {
    let id = this.$route.params.id;
    axios
      .get('/api/order/details/'+id)
      .then(({ data }) => (this.orders = data))
      .catch(console.log('error'));

    axios
      .get('/api/order/orderdetails/'+id)
      .then(({ data }) => (this.details = data))
      .catch();
  },

};
</script>

<style scoped>

</style>
