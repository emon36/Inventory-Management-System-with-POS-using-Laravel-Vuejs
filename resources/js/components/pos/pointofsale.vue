<template>
    <div>

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
             
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            
          
            <!-- Area Chart -->
            <div class="col-xl-5 col-lg-5">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6>
                 <a class="btn btn-sm btn-info"><font color ="#ffffff">Add Customer </font></a>
                </div>
               
                
                <div class="table-responsive" style="font-size:12px;">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="cart in carts" :key="cart.id">
                        <td> {{ cart.product_name }} </td>
                        <td > <input type="text" readonly="" style="width:28px;" :value="cart.product_quantity">
                        <button @click.prevent="increment(cart.id)" class="btn btn-sm btn-success "> + </button>
                        <button @click.prevent="decrement(cart.id)" class="btn btn-sm btn-danger" v-if="cart.product_quantity >= 2">-</button> 

                        <button  class="btn btn-sm btn-danger" v-else disabled="disabled">-</button>
   
                        </td>
                        
                        <td> {{ cart.product_price}} </td>
                        <td>{{ cart.sub_total}}</td>
                        <td><a @click="removeItem(cart.id)" class="btn btn-sm btn-primary">X</a></td>
                      </tr>
                
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity: <strong> {{ quantity }} </strong>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total: <strong> {{ subtotal }} </strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">VAT: <strong> {{vats.vat}} %</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">Total: <strong> {{subtotal*vats.vat/100 + subtotal}} </strong>
                    </li>
                   
                  </ul>
                  <br> 
                  <form @submit.prevent="orderPlace"> 

                    <label> Customer Name</label>
                     <select class="form-control" v-model="customer_id">
                       <option :value="customer.id" v-for="customer in customers" :key="customer.id"> {{customer.name}} </option>                  
                     </select>

                     <label> Paid </label>
                     <input type="text" class="form-control" required="" v-model="paid">

                     <label> Due </label>
                     <input type="text" class="form-control" :value="duecalculate" required="">
              <label> Payment  Method  </label>
                     <select class="form-control" v-model="paidBy">
                       <option value="cash"> Cash </option>
                       <option value="cheaque">Cheaque</option>
                     </select>

                     <br>
                     <button type="sumbit" class="btn btn-success">Submit </button>
                  </form>
                </div>
              </div>
            </div>
              
            <!-- Pie Chart -->
            <div class="col-xl-7 col-lg-7">
                
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                  
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Product</a>
  </li>
  <li class="nav-item"  v-for="category in categories" :key="category.id">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="subproduct(category.id)">{{category.category_name}}</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><div class="card-body">
             <input type="text" class ="form-control" v-model="searchItem" style="width:540px;" placeholder="search name of product">

                    <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product in search" :key="product.id">
                        <button class="btn btn-sm" @click.prevent="AddToCart(product.id)">
                  <div class="card" style="width: 8rem; margin-bottom:5px;">
  
             <img class="card-img-top" :src="product.image" id="em_photo" alt="Card image cap">
               <div class="card-body">
                   
                <h6 class="card-title"> {{ product.product_name }} </h6>
                 <span class="badge badge-success"  v-if="product.product_quantity >=1">Available {{product.product_quantity}} </span>
                 <span class="badge badge-danger" v-else>Stock out</span>
                        
   
                </div>
             </div> </button>
                </div>
                
              </div>
            </div></div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
    <input type="text" class ="form-control" v-model="searchItem" style="width:540px;" placeholder="search name of product">

                    <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="getproduct in getsearch" :key="getproduct.id">
                        <button class="btn btn-sm" @click.prevent="AddToCart(getproduct.id)">
                  <div class="card" style="width: 8rem; margin-bottom:5px;">
  
             <img class="card-img-top" :src="getproduct.image" id="em_photo" alt="Card image cap">
               <div class="card-body">
                   
                <h6 class="card-title"> {{ getproduct.product_name }} </h6>
                 <span class="badge badge-success"  v-if="getproduct.product_quantity >=1">Available {{getproduct.product_quantity}} </span>
                 <span class="badge badge-danger" v-else>Stock out</span>
                        
   
                </div>
             </div> </button>
                </div>
                
              </div>
  </div>
 
</div>
                
            </div>
            
          </div>
          <!--Row-->

         

          <!-- Modal Logout -->
         

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
  created(){
    this.allproduct();
   this.allcategories();
   this.allcustomer();
   this.cartProduct();
   this.vat();
   
   Reload.$on('AfterAdd',() =>{
     this.cartProduct();
   })

  },
  data(){
    return{
      customer_id:'',
      paid:'',
      due:'',
      paidBy:'',
      products:[],
      categories:'',
      getproducts:[],
      searchItem:'',
      customers:'',
      carts:[],
      vats:'',
      errors:'',


    }
  },
   
   computed:{
     search(){
       return this.products.filter(product => {
         return product.product_name.match(this.searchItem)
       })
     },
      getsearch(){
       return this.getproducts.filter(getproduct => {
         return getproduct.product_name.match(this.searchItem)
       })
     },

     quantity(){
      let sum = 0;  
       for( let i= 0; i< this.carts.length;i++){
         sum += (parseFloat(this.carts[i].product_quantity));
       }
      return sum;
     },
     subtotal(){

       let sum = 0;  
       for( let i= 0; i< this.carts.length;i++){
         sum += (parseFloat(this.carts[i].product_quantity) * (this.carts[i].product_price));
       }
      return sum;

     },

     duecalculate(){
       
       let calculateDue = this.subtotal*this.vats.vat/100 + this.subtotal - this.paid;

       if(calculateDue < 0)
       {
         return 0;
       }

       this.due = calculateDue;

       return calculateDue;
     }
   },
  methods:{


    cartProduct(){

       axios.get('/api/cart/product/')
    .then(({data}) => (this.carts = data))
    .catch()
    },

    increment(id){
      axios.get('/api/cart/increment/'+id)
    .then(() => {
     Reload.$emit('AfterAdd');
    Notification.success()
    })
    .catch()
    },
    decrement(id){
      axios.get('/api/cart/decrement/'+id)
    .then(() => {
      Reload.$emit('AfterAdd');
    Notification.success()
    })
    .catch()
    },

    removeItem(id){
     axios.get('/api/remove/cart/'+id)
    .then(() => {
      Reload.$emit('AfterAdd');
    Notification.cart_remove()
    })
    },

    AddToCart(id){
      axios.get('/api/addToCart/'+id)
    .then(() => {
      Reload.$emit('AfterAdd');
    Notification.cart_success()
    })
    .catch()
      
    },

    vat(){
      axios.get('/api/vats/')
    .then(({data}) => (this.vats = data))
    .catch() 
    },
    
  allproduct(){

    axios.get('/api/product/')
    .then(({data}) => (this.products = data))
    .catch()

  },
  allcategories(){

    axios.get('/api/category/')
    .then(({data}) => (this.categories = data))
    .catch()

  },

  allcustomer(){

    axios.get('/api/customer/')
    .then(({data}) => (this.customers = data))
    .catch(console.log('error'))

  },
  subproduct(id){

    axios.get('/api/getting/product/'+id)
    .then(({data}) => (this.getproducts = data))
    .catch()

  },

  orderPlace(){
     let total = this.subtotal*this.vats.vat/100 + this.subtotal;

     var data = {quantity:this.quantity,subtotal:this.subtotal,customer_id:this.customer_id,paidBy:this.paidBy,paid:this.paid,due:this.due,vat:this.vats.vat,total:total}
      

      axios.post("/api/orderplace", data)
                .then(() => {   
                   Notification.success()
                    this.$router.push({ name: "Home" });
                })
               
  }
 
 
  
  },
  

}
</script>

<style scoped>

#em_photo{
        height: 100px;
        width: 130px;
}
</style>