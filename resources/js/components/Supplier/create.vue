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
                    <li class="breadcrumb-item "><router-link :to="{ name: 'supplier' }"
                            > Supplier List</router-link
                        ></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Add New Supplier
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

                            <form
                                class="user"
                                @submit.prevent="saveForm"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                <div class="row login-form">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputName"
                                                placeholder="Enter Your Full Name"
                                                v-model="form.name"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.name"
                                                >{{ errors.name[0] }}</small
                                            >
                                        </div>

                                        
                                        <div class="form-group">
                                            <input
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter Phone Number"
                                                v-model="form.phone"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.phone"
                                                >{{ errors.phone[0] }}</small
                                            >
                                        </div>

                                         <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputshopName"
                                                placeholder="Enter Shop name"
                                                v-model="form.shopname"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.shopname"
                                                >{{ errors.shopname[0] }}</small
                                            >
                                        </div>

                                        <div class="form-group">
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
                                                v-if="errors.photo"
                                                >{{ errors.photo[0] }}</small
                                            >
                                        </div>
                                        <div class="form-group">
                                            <img
                                                :src="form.photo"
                                                alt="Employee Photo"
                                                height="70px"
                                                width="70px"
                                                class="rounded"
                                                v-if="form.photo"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="exampleInputEmail"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Email Address"
                                                v-model="form.email"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.email"
                                                >{{ errors.email[0] }}</small
                                            >
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <textarea
                                                name="address"
                                                v-model="form.address"
                                                id="address"
                                                rows="5"
                                                class="form-control"
                                                placeholder="Enter Your Address"
                                            ></textarea>
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
                name: "",
                email: "",
                address: "",
                phone: "",
                photo: "",
                shopname: ""
            },
            errors: []
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
                    this.form.photo = event.target.result;
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
        saveForm() {
            axios
                .post("/api/supplier", this.form)
                .then(res => {
                    this.$router.push({ name: "supplier" });
                    Toast.fire({
                        icon: "success",
                        title: "Supplier Created Succesfully"
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    Toast.fire({
                        icon: "error",
                        title: "Supplier can't be Created"
                    });
                });
        }
    }
};
</script>

<style></style>