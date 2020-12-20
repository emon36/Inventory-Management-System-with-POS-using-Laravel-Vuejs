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
                    <li class="breadcrumb-item active">Employee list</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <router-link :to="{ name: 'create-employee' }"
                            >Add a new employee</router-link
                        >
                    </li>
                </ol>

                <input type="text" class ="form-control" v-model="searchItem" style="width:300px;" placeholder="search name of employee">
            </div>

           


            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                     Employee List
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
                        <th>salary</th>
                        <th>Address</th>
                        <th>Joining Date</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>    
                      <tr v-for= "employee in  search" :key="employee.id">
                        <td>{{ employee.name }}</td>
                        <td><img :src="employee.photo" id="em_photo"></td>
                        <td>{{employee.email}}</td>
                        <td>{{employee.phone}}</td>
                        <td>{{employee.salary}}</td>
                        <td>{{employee.address}}</td>
                        <td>{{employee.joining_date}}</td>
                        <td>
                          <router-link :to ="{ name:'edit-employee', params:{id:employee.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                          <a @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger">Delete</a>
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
      employees:[],
      searchItem:''

    }
  },
   
   computed:{
     search(){
       return this.employees.filter(employee => {
         return employee.name.match(this.searchItem)
       })
     }

   },
  methods:{
  allEmployee(){

    axios.get('/api/employee/')
    .then(({data}) => (this.employees = data))
    .catch()

  },
 

     deleteEmployee(id){
          
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

    axios.delete('/api/employee/'+id)
    .then(() => {
      this.employees = this.employees.filter(employee =>{
        return employee.id != id
      })
    })

    .catch(()=> {
      this.$router.push({name: 'employee'})
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
    this.allEmployee();

  }

}
</script>

<style scoped>

#em_photo{
        height: 40px;
        width: 40px;
}
</style>