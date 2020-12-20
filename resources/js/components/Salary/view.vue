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
                    <li class="breadcrumb-item active">salary list</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <router-link :to="{ name: 'allSalary' }"
                            > All Salary </router-link
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
                                     Month wise Employee Salary
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
                        <th>Month</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>    
                      <tr v-for= "salary in  search" :key="salary.id">
                        <td>{{ salary.name }}</td>
                        
                        <td>{{salary.salary_month}}</td>
                        <td>{{salary.amount}}</td>
                        <td>{{salary.salary_date}}</td>
                        <td>
                          <router-link :to ="{ name:'edit-salary', params:{id:salary.id}}" class="btn btn-sm btn-primary">Edit Salary</router-link>
                         
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
         return salary.name.match(this.searchItem)
       })
    }
  },
  methods:{
  viewSalary(){

    let id = this.$route.params.id
        axios.get('/api/salary/view/'+id)
       .then(({data}) => (this.salaries = data))

      .catch(error => this.errors = error.response.data.errors)

  },
 
  
  },
  created(){
    this.viewSalary();

  }

}
</script>

<style scoped>

#em_photo{
        height: 40px;
        width: 40px;
}
</style>