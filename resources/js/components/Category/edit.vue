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
                    <li class="breadcrumb-item "><router-link :to="{ name: 'category' }"
                            > Catergory List</router-link
                        ></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Add New Category
                    </li>
                </ol>
            </div>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                    Add New Employee
                                </h1>
                            </div>

                            <form
                                class="user"
                                @submit.prevent="updateForm"
                                
                                enctype="multipart/form-data"
                            >
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group ml-2">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputName"
                                                placeholder="Enter Category Name"
                                                v-model="form.category_name"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.category_name"
                                                >{{ errors.category_name[0] }}</small
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <button
                                    type="submit"
                                    class="btn btn-primary ml-5 btn-lg" 
                                >
                                    Update
                                </button>
                                    </div>
                                </div>

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
                category_name: "",
                
            },
            errors: []
        };
    },
    created(){
            let id = this.$route.params.id
            axios.get('/api/category/'+id)
                .then(({data}) => (this.form = data))
                .catch()
        },
    
    methods: {  
        updateForm() {
            
               let id = this.$route.params.id
            axios.patch("/api/category/" +id, this.form)
                .then( () => {
                    this.$router.push({ name: "category" });
                    Toast.fire({
                        icon: "success",
                        title: "Category Created Succesfully"
                    });
                })
                .catch(error => this.errors = response.data.errors)
        }
    }
};
</script>

<style></style>