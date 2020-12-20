<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>

    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                  Toadys Sell
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ todaySell }}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"
                    ><i class="fa fa-arrow-up"></i> 3.48%</span
                  >
                  <span>Since last month</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Today's Income</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{income}}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"
                    ><i class="far fa-money-bill-alt"></i> 12%</span
                  >
                  <span>Since last years</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Today's Due</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{due}}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"
                    ><i class="fa fa-arrow-up"></i> 20.4%</span
                  >
                  <span>Since last month</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                  Today's Expense
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ expense}}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-danger mr-2"
                    ><i class="fas fa-arrow-down"></i> 1.10%</span
                  >
                  <span>Since yesterday</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

            <div class="col-lg-12 col-sm-12 mb-4 mt-2">
             
              <div class="card">
               
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Product Code</th>
                        <th>Buying Price </th>
                        <th>status</th>
                        <th>Product Quantity</th>
                        

                      </tr>
                    </thead>
                    <tbody>    
                      <tr v-for= "product in  products" :key="product.id">
                        <td>{{ product.product_name }}</td>
                        <td><img :src="product.image" id="em_photo"></td>
                        <td>{{product.product_code}}</td>                      
                        <td>{{product.buying_price}}</td>
                        <td v-if="product.product_quantity >=1 "> <span class="badge badge-success">Available </span>
                        </td>
                        <td v-else> <span class="badge badge-danger">Stock out</span>
                        </td>
                        <td>{{product.product_quantity}}</td>
                        
                     
                      </tr>
                    </tbody>
                  </table>
                </div>
               
              </div>
            </div>
          


      
    </div>
    <!--Row-->

    <!-- Modal Logout -->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabelLogout"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to logout?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
              Cancel
            </button>
            <a href="login.html" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "/" });
    }
  },

  data() {
    return {
      todaySell: "",
      income: "",
      due: "",
      expense: "",
      products:'',
    };
  },

  mounted() {
    this.TodaySell();
    this.TodayIncome();
    this.TodayDue();
    this.TodayExpense();
    this.Stockout();
  },

  methods: {
    TodaySell() {
      axios
        .get("/api/today/sell")
        .then(res => {
      this.todaySell = res.data})
        .catch();
    },
    TodayIncome() {
      axios
        .get("/api/today/income")
        .then(res => {
      this.income = res.data})
        .catch();
    },
     TodayDue() {
      axios
        .get("/api/today/due")
        .then(res => {
      this.due = res.data})
        .catch();
    },
     TodayExpense() {
      axios
        .get("/api/today/expense")
        .then(res => {
        this.expense = res.data})
        .catch();
    },

    Stockout() {
      axios
        .get("/api/stockout")
        .then(({data})=> (this.products = data))
        .catch();
    },
  },
};
</script>

<style scoped>
#em_photo{
        height: 40px;
        width: 40px;
}
</style>
