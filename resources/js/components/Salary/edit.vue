<template>
<div>
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
                    <li class="breadcrumb-item "><router-link :to="{ name: 'allSalary' }"
                            > Salary Details</router-link
                        ></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Add New Salary
                    </li>
                </ol>
            </div>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                    Add New Suppplier
                                </h1>
                            </div>

                           <form @submit.prevent="salaryUpdate" method="post"  enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                    <label>Full Name</label>
                                        <input type="text" v-model="form.name" class="form-control"   required="">
                                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                    <label>Email Address</label>
                                        <input type="text" v-model="form.email" class="form-control" >
                                        <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                       <label for="months">Months</label>
                      <select class="form-control" id="exampleFormControlSelect2" v-model="form.salary_month">
                        <option value="January"> January </option>
                        <option value="February"> February </option>
                        <option value="March"> March </option>
                        <option value="April"> April </option>
                        <option value="May"> May </option>
                        <option value="June"> June </option>
                        <option value="July"> July </option>
                        <option value="Agust">Agust </option>
                        <option value="Semptember"> September </option>
                        <option value="Octobor"> Octobor </option>
                        <option value="November"> November</option>
                        <option value="Decmber"> December </option>
                        <small class="text-danger" v-if="errors.salary_month">{{ errors.salary_month[0] }}</small>
                      </select>
                                    </div>
                                </div>

                                <input type="hidden" v-model="form.employee_id">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                          <label>Amount</label>
                                        <input type="text" v-model="form.amount" class="form-control"  required="">
                                       
                                        <small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                      
                        <button type="submit" class="btn btn-success"> Pay Now</button>
                    </form>
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
        mounted(){
            if (!User.loggedIn()) {
                this.$router.push({ name:'/' })
            }
        },
        data(){
            return{
                form:{
                    name:'',
                    email:'',
                    salary_month:'',
                    employee_id:'',
                    amount:'',

                   
                   
                },
                errors:{},
            }
        },
        created(){
            let id = this.$route.params.id
            axios.get('/api/edit/salary/'+id)
                .then(({data}) => (this.form = data))
                .catch()
        },
        methods:{
            
            salaryUpdate(){
                let id = this.$route.params.id
                axios.post('/api/salary/update/'+id,this.form)
                    .then(() => {
                        this.$router.push({ name: 'allSalary' })
                        Notification.success()
                    })
                    .catch(error => this.errors = error.response.data.errors)
            },
        }
    }
</script>

<style>
    #add_new{
        float: right;
    }
</style>