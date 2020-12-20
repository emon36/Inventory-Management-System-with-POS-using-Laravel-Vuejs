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
                    <li class="breadcrumb-item active">product list</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <router-link :to="{ name: 'create-product' }"
                            >Add a new product</router-link
                        >
                    </li>
                </ol>

                <input type="text" class ="form-control" v-model="searchItem" style="width:300px;" placeholder="search name of product">
            </div>

           


            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                     Product List
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
                        <th>Image</th>
                        <th>Product Code</th>
                        <th>Category </th>
                        <th>Buying Price </th>
                        <th>status</th>
                        <th>Product Quantity</th>
                        
                        
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>    
                      <tr v-for= "product in  search" :key="product.id">
                        <td>{{ product.product_name }}</td>
                        <td><img :src="product.image" id="em_photo"></td>
                        <td>{{product.product_code}}</td>
                        <td>{{product.category_name}}</td>
                        <td>{{product.buying_price}}</td>
                        <td v-if="product.product_quantity >=1 "> <span class="badge badge-success">Available </span>
                        </td>
                        <td v-else> <span class="badge badge-danger">Stock out</span>
                        </td>
                        <td>{{product.product_quantity}}</td>
                        
                        <td>
                          <router-link :to ="{ name:'edit-stock', params:{id:product.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                          
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
      products:[],
      searchItem:''

    }
  },
   
   computed:{
     search(){
       return this.products.filter(product => {
         return product.product_name.match(this.searchItem)
       })
     }

   },
  methods:{
  allproduct(){

    axios.get('/api/product/')
    .then(({data}) => {this.products = data
    })
    .catch()

  },
 

     
  
  },
  created(){
    this.allproduct();

  }

}
</script>

<style scoped>

#em_photo{
        height: 40px;
        width: 40px;
}
</style>