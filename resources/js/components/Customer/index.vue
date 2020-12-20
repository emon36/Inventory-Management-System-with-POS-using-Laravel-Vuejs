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
                    <li class="breadcrumb-item active">Customer list</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <router-link :to="{ name: 'create-customer' }"
                            >Add a new customer</router-link
                        >
                    </li>
                </ol>

                <input type="text" class ="form-control" v-model="searchItem" style="width:300px;" placeholder="search name of customer">
            </div>

           


            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                     customer List
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
                        <th>Photo</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>    
                      <tr v-for= "customer in  search" :key="customer.id">
                        <td>{{ customer.name }}</td>
                         <td><img :src="customer.photo" id="em_photo"></td>
                        <td>{{customer.email}}</td>
                        <td>{{customer.phone}}</td>
                        <td>
                          <router-link :to ="{ name:'edit-customer', params:{id:customer.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                          <a @click="deletecustomer(customer.id)" class="btn btn-sm btn-danger">Delete</a>
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
      customers:[],
      searchItem:''

    }
  },
   
   computed:{
     search(){
       return this.customers.filter(customer => {
         return customer.name.match(this.searchItem)
       })
     }

   },
  methods:{
  allcustomer(){

    axios.get('/api/customer/')
    .then(({data}) => (this.customers = data))
    .catch()

  },

     deletecustomer(id){
          
          Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

    axios.delete('/api/customer/'+id)
    .then(() => {
      this.customers = this.customers.filter(customer =>{
        return customer.id != id
      })
    })

    .catch(()=> {
      this.$router.push({name: 'customer'})
    })
    Swal.fire( 
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

        },
  
  },
  created(){
    this.allcustomer();

  }

}
</script>

<style scoped>
#em_photo{
  height: 70px;
  width: 70px;
}


</style>