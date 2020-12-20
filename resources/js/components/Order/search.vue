<template>
    <div class="row justify-content-center">
        <div class="col-12">
            <div
                class="d-sm-flex align-items-center justify-content-between mb-4"
            >
                
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <router-link :to="{ name: 'Home' }"
                            >Dashboard</router-link
                        >
                    </li>
                    <li class="breadcrumb-item "><router-link :to="{ name: 'order' }"
                            > Order List</router-link
                        ></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Search Order By Date
                    </li>
                </ol>
            </div>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                    Search Order By Date
                                </h1>
                            </div>

                            <form
                                class="user"
                                @submit.prevent="searchOrder"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group ml-2">
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="exampleInputDate"
                                                placeholder="Enter Order Date"
                                                v-model="date"
                                            />
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <button
                                    type="submit"
                                    class="btn btn-primary ml-5 btn-lg" 
                                >
                                    Submit
                                </button>
                                    </div>
                                </div>

                            </form>
                        </div>
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
                        <h6 class="m-0 font-weight-bold text-primary">Products orders</h6>
                      </div>
                   <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>vat</th>
                        <th>Total</th>
                        <th>Paid</th>
                        <th>Due</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="order in orders" :key="order.id">
                        <td>{{order.name}}</td>
                        <td>{{order.quantity}}</td>
                        <td>{{order.sub_total}}</td>
                        <td>{{order.vat}}</td>
                        <td>{{order.total}}</td>
                        <td>{{order.paid}}</td>
                        <td>{{order.due}}</td>

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
</template>

<script>
export default {
    created() {
         if(!User.loggedIn())
    {
      this.$router.push({name : 'Home'})
    }
    },
    data() {
        return {
            
                date: '',
                orders:{} ,
           
        };
    },
    
    methods: {  
        searchOrder() {

            var data = {data:this.date}
            axios
                .post("/api/search/order/", data)
                .then(({data}) => (this.orders = data))
                .catch(error => {
                    this.errors = error.response.data.errors;
                    
                });
        }
    }
};
</script>

<style></style>