<template>
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
                    <li class="breadcrumb-item "><router-link :to="{ name: 'product' }"
                            > Product List</router-link
                        ></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Add New Product
                    </li>
                </ol>
            </div>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                    Add New Product
                                </h1>
                            </div>

                            <form
                                class="user"
                                @submit.prevent="saveForm"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                <div class="row login-form">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> Product Name </label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputProductName"
                                                placeholder="Enter Product Name"
                                                v-model="form.product_name"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.product_name"
                                                >{{ errors.product_name[0] }}</small
                                            >
                                        </div>

                                        <div class="form-group">
                                            <label> Product Buying Date </label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter Buying Date"
                                                v-model="form.buying_date"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.buying_date"
                                                >{{
                                                    errors.buying_date[0]
                                                }}</small
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label> Product Code </label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter Product Code"
                                                v-model="form.product_code"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.product_code"
                                                >{{ errors.product_code[0] }}</small
                                            >
                                        </div>

                                        <div class="form-group">
                      <label for="exampleFormControlSelect1">Product Category</label>
                      <select class="form-control" id="exampleFormControlSelect1" v-model="form.category_id">
                        <option :value="category.id" :key="category.id" v-for="category in categories">{{category.category_name}}</option>
                      </select>
                    </div>

                           
                                        <div class="form-group">
                                            <label> Upload Product Image </label>
                                            <div class="custom-file">
                                                <input
                                                    type="file"
                                                    class="custom-file-input"
                                                    id="customFile"
                                                    @change="onFileSelected"
                                                />
                                                <label
                                                    class="custom-file-label"
                                                    for="customFile"
                                                    >Choose file</label
                                                >
                                            </div>
                                            <small
                                                class="text-danger"
                                                v-if="errors.image"
                                                >{{ errors.image[0] }}</small
                                            >
                                        </div>
                                        <div class="form-group">
                                            <img
                                                :src="form.image"
                                                alt="Product Photo"
                                                height="70px"
                                                width="70px"
                                                class="rounded"
                                                v-if="form.image"
                                            />
                                        </div>


                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> Product Buying Price </label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="exampleInputPrice"
                                                aria-describedby="buyingPrice"
                                                placeholder="Enter Product Buying price"
                                                v-model="form.buying_price"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.buying_price"
                                                >{{ errors.buying_price[0] }}</small
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label> Product Selling Price </label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter  Selling price"
                                                v-model="form.selling_price"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.selling_price"
                                                >{{ errors.selling_price[0] }}</small
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label> Product Quantity </label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter Product Quantity"
                                                v-model="form.product_quantity"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.product_quantity"
                                                >{{ errors.product_quantity[0] }}</small
                                            >
                                        </div>
                                        <div class="form-group">
                      <label for="exampleFormControlSelect2">Product Suppliier</label>
                      <select class="form-control" id="exampleFormControlSelect2" v-model="form.supplier_id">
                        <option  :value="supplier.id" :key="supplier.id" v-for="supplier in suppliers" > {{supplier.name}} </option>
                       
                      </select>
                    </div>
                      <div class="form-group">
                                 <label> Product Root</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputRoot"
                                                placeholder="Enter  product Root"
                                                v-model="form.root"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.root"
                                                >{{ errors.root[0] }}</small
                                            >
                                        </div>
                                    </div>
                                </div>

                                <button
                                    type="submit"
                                    class="btn btn-primary float-right mr-5 mb-3"
                                >
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created() {
         if(!User.loggedIn())
    {
      this.$router.push({name : 'Home'})
    }
    },
    data() {
        return {
            form: {
                product_name: "",
                product_code: "",
                category_id: "",
                supplier_id: "",
                root: "",
                buying_price: "",
                selling_price: "",
                buying_date: "",
                image: "",
                product_quantity: "",
            },
            errors: {},
            categories:{},
            suppliers:{}
        };
    },
    
    methods: {
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048576) {
                Toast.fire({
                    icon: "error",
                    title: "Image size cannt be more than 1MB!"
                });
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.image = event.target.result;
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
        saveForm() {
            axios
                .post("/api/product", this.form)
                .then(() => {
                    this.$router.push({ name: "product" });
                    Toast.fire({
                        icon: "success",
                        title: "Product Created Succesfully"
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    Toast.fire({
                        icon: "error",
                        title: "Product can't be Created"
                    });
                });



        },
         

    },

    mounted(){
            axios.get('/api/category/')
            .then(({data})=>(this.categories = data))

             axios.get('/api/supplier/')
            .then(({data})=>(this.suppliers = data))
        }


}
</script>

<style></style>