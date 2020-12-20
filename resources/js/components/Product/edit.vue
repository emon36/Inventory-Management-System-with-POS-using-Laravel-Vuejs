<template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">product</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row container">
            <div class="card col-lg-12">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    product Update
                    <router-link to="/product" class="btn btn-sm btn-info" id="add_new"> All product</router-link>
                </div>
                <div class="card-body">

                <form @submit.prevent="productUpdate" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                
                                    <div class="form-label-group">
                                    <label>Product Name</label>
                                        <input type="text" v-model="form.product_name" class="form-control"   required="">
                                        <small class="text-danger" v-if="errors.product_name">{{ errors.product_name[0] }}</small>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                    <label>Product Code </label>
                                        <input type="number" v-model="form.product_code" class="form-control" >
                                        <small class="text-danger" v-if="errors.product_code">{{ errors.product_code[0] }}</small>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                    <label>Product Buying Price</label>
                                        <input type="number" v-model="form.buying_price" class="form-control"  required="">
                                        <small class="text-danger" v-if="errors.buying_price">{{ errors.buying_price[0] }}</small>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                      <label>Product Selling Price</label>
                                        <input type="text" v-model="form.selling_price" class="form-control"  required="">
                                        
                                        <small class="text-danger" v-if="errors.selling_price">{{ errors.selling_price[0] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                    <label>Product Buying Date</label>
                                        <input type="date" v-model="form.buying_date" class="form-control"  autofocus="autofocus" required="">
                                        <small class="text-danger" v-if="errors.buying_date">{{ errors.buying_date[0] }}</small>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                       <label for="exampleFormControlSelect1">Product Category</label>
                      <select class="form-control" id="exampleFormControlSelect1" v-model="form.category_id">
                        <option :value="category.id" :key="category.id" v-for="category in categories">{{category.category_name}}</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                         <label for="exampleFormControlSelect2">Product Suppliier</label>
                      <select class="form-control" id="exampleFormControlSelect2" v-model="form.supplier_id">
                        <option  :value="supplier.id" :key="supplier.id" v-for="supplier in suppliers" > {{supplier.name}} </option>
                       
                      </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                    <label>Product Quantity</label>
                                        <input type="number" v-model="form.product_quantity" class="form-control"  required="">
                                        <small class="text-danger" v-if="errors.product_quantity">{{ errors.product_quantity[0] }}</small>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                    <label>Product Root</label>
                                        <input type="text" v-model="form.root" class="form-control"  required="">
                                        <small class="text-danger" v-if="errors.root">{{ errors.root[0] }}</small>
                                        
                                    </div>
                                </div>

                            

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="file" class="btn btn-info" @change="onFileselected">

                                        <small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img :src="form.image" style="height:40px; width: 40px;">
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
                product_name: "",
                product_code: "",
                category_id: "",
                supplier_id: "",
                root: "",
                buying_price: "",
                selling_price: "",
                buying_date: "",
                image: "",
                newimage:"",
                product_quantity: "",
                },
                errors:{},
                categories:{},
                suppliers:{}
            }
        },
        created(){
            let id = this.$route.params.id
            axios.get('/api/product/'+id)
                .then(({data}) => (this.form = data))
                .catch()
                
        },
         mounted(){
            axios.get('/api/category/')
            .then(({data})=>(this.categories = data))

             axios.get('/api/supplier/')
            .then(({data})=>(this.suppliers = data))
        },
        methods:{
            onFileselected(event){
                let file=event.target.files[0];
                if (file.size > 1048770) {
                    Notification.image_validation()
                }else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.newimage = event.target.result
                        
                    };
                    reader.readAsDataURL(file);
                }
            },
            productUpdate(){
                let id = this.$route.params.id
                axios.patch('/api/product/'+id,this.form)
                    .then(() => {
                        this.$router.push({ name: 'product' })
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