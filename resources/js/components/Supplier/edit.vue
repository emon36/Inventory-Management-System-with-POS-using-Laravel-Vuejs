<template>
    <div>
        <!-- Breadcrumbs-->
         <div
                class="d-sm-flex align-items-center justify-content-between mb-4"
            >
                
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <router-link :to="{ name: 'Home' }"
                            >Dashboard</router-link
                        >
                    </li>
                    <li class="breadcrumb-item "><router-link :to="{ name: 'supplier' }"
                            > Supplier List</router-link
                        ></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Add New Supplier
                    </li>
                </ol>
            </div>
        <!-- Icon Cards-->
        <div class="row container">
            <div class="card col-lg-12">
                <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                    Update Suppplier
                                </h1>
                            </div>
                <div class="card-body">
                    <form @submit.prevent="supplierUpdate" enctype="multipart/form-data">
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
                                        <label>Address</label>
                                        <input type="text" v-model="form.address" class="form-control"  required="">
                                        <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label>Shop name</label>
                                        <input type="text" v-model="form.shopname" class="form-control"  required="">
                                        <small class="text-danger" v-if="errors.shopname">{{ errors.shopname[0] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                               
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" v-model="form.phone" class="form-control"  required="">
                                        <label>Phone Number</label>
                                        <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <div class="custom-file">
                                        <input type="file"  class="custom-file-input"
                                                    id="customFile" @change="onFileselected">
                                                    <label
                                                     class="custom-file-label"
                                                    for="customFile"
                                                    >Choose file</label
                                                >

                                        <small class="text-danger" v-if="errors.photo">{{ errors.photo[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img :src="form.photo" style="height:40px; width: 40px;">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
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
                    name :'',
                    email :'',
                    shopname:'',
                    address:'',
                    photo :'',
                    newphoto:'',
                    phone:'',
                },
                errors:{},
            }
        },
        created(){
            let id = this.$route.params.id
            axios.get('/api/supplier/'+id)
                .then(({data}) => (this.form = data))
                .catch()
        },
        methods:{
            onFileselected(event){
                let file=event.target.files[0];
                if (file.size > 1048770) {
                    Notification.image_validation()
                }else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.newphoto = event.target.result
                        
                    };
                    reader.readAsDataURL(file);
                }
            },
            supplierUpdate(){
                let id = this.$route.params.id
                axios.patch('/api/supplier/'+id,this.form)
                    .then(() => {
                        this.$router.push({ name: 'supplier' })
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