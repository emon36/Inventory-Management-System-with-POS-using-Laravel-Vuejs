<template>
    <div class="row justify-content-center">
        <div class="col-12">
            <div
                class="d-sm-flex  justify-content-between mb-4"
            >
                


                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <router-link :to="{ name: 'Home' }"
                            >Dashboard</router-link
                        >
                    </li>
                    <li class="breadcrumb-item active">order list</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <router-link :to="{ name: 'search' }"
                            >Search order</router-link
                        >
                    </li>
                </ol>

                <input type="text" class ="form-control" v-model="searchItem" style="width:300px;" placeholder="search name of order">
            </div>

           


            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                     Today's Order
                                </h1>
                            </div>

                              <div class="row">
            <div class="col-lg-12 mb-4 mt-2">
             
              <div class="card">
               
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Total Amount</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Paid By</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>    
                      <tr v-for= "order in  search" :key="order.id">
                        <td>{{ order.name }}</td>
                        <td>{{order.total}}</td>
                        <td>{{order.paid}}</td>
                        <td>{{order.due}}</td>
                        <td>{{order.payBy}}</td>
                        <td>
                          <router-link :to ="{ name:'view-order', params:{id:order.id}}" class="btn btn-sm btn-primary">View</router-link>
                          </td>
                      </tr>
                    </tbody>
                  </table>
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
      created(){
    if(!User.loggedIn())
    {
      this.$router.push({name : '/'})
    }
  },
  data(){
    return{
      orders:[],
      searchItem:''

    }
  },
   
   computed:{
     search(){
       return this.orders.filter(order => {
         return order.name.match(this.searchItem)
       })
     }

   },
  methods:{
  allorder(){

    axios.get('/api/order/')
    .then(({data}) => (this.orders = data))
    .catch()

  },

  
  },
  created(){
    this.allorder();

  }

}
</script>

<style scoped>
#em_photo{
  height: 70px;
  width: 70px;
}


</style>