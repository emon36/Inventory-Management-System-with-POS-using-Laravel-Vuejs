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
                    <li class="breadcrumb-item "><router-link :to="{ name: 'expense' }"
                            > Expense List</router-link
                        ></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Add New Expense
                    </li>
                </ol>
            </div>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mt-4">
                                    Add New Expense 
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
                                            <textarea
                                                name="expense"
                                                v-model="form.details"
                                                id="details"
                                                rows="3"
                                                class="form-control"
                                                placeholder="Enter expense Details"
                                            ></textarea>
                                            <small
                                                class="text-danger"
                                                v-if="errors.details"
                                                >{{ errors.details[0] }}</small
                                            >
                                        </div>

                                        
                                        <div class="form-group">
                                            <input
                                                type="number"
                                                class="form-control"
                                                placeholder="Enter Expense amoount"
                                                v-model="form.amount"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.amount"
                                                >{{ errors.amount[0] }}</small
                                            >
                                        </div>

                                          <div class="form-group">
                                            <input
                                                type="date"
                                                class="form-control"
                                                placeholder="Enter Expense Date"
                                                v-model="form.expense_date"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.expense_date"
                                                >{{
                                                    errors.expense_date[0]
                                                }}</small
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
                details: "",
                amount: "",
                expense_date: "",
            },
            errors: []
        };
    },
    
    methods: {
        saveForm() {
            axios
                .post("/api/expense", this.form)
                .then(res => {
                    this.$router.push({ name: "expense" });
                    Toast.fire({
                        icon: "success",
                        title: "Expense Created Succesfully"
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    Toast.fire({
                        icon: "error",
                        title: "Expense can't be Created"
                    });
                });
        }
    }
};
</script>

<style></style>