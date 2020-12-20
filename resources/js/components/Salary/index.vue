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
                        <router-link :to="{ name: 'given-salary' }"
                            >Pay Salary</router-link
                        >
                    </li>
                </ol>

                <input type="text" class ="form-control" v-model="searchItem" style="width:300px;" placeholder="search name of month">
            </div>

           


            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                     All Salary Details
                                </h1>
                            </div>

                              <div class="row">
            <div class="col-lg-12 mb-4 mt-2">
             
              <div class="card">
               
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Month name</th>
                        <th>Details</th>
                        

                      </tr>
                    </thead>
                    <tbody>    
                      <tr v-for= "salary in search" :key="salary.id">
                        <td>{{ salary.salary_month }}</td>
        
                       
                        
                        <td>
                          <router-link :to ="{ name:'view-salary', params:{id:salary.salary_month}}" class="btn btn-sm btn-primary">View Salary</router-link>
                          
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
      salaries:[],
      searchItem:''

    }
  },
   
   computed:{
     search(){
       return this.salaries.filter(salary => {
         return salary.salary_month.match(this.searchItem)
       })
     }

   },
  methods:{
  allSalary(){

    axios.get('/api/salary/')
    .then(({data}) => (this.salaries = data))
    .catch()

  },
 

  
  },
  created(){
    this.allSalary();

  }

}
</script>

<style scoped>


</style>