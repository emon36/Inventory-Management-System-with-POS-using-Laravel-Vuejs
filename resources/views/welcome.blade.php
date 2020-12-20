<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('backend/img/logo/admin-user.jpg')}}" rel="icon">
  <title> Larvel Inventory</title>
  <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('backend/css/ruang-admin.min.css')}}" rel="stylesheet">
<link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body id="page-top">
  <div id="app">
  <div id="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar" v-show = "$route.path === '/' || $route.path ==='/register' || $route.path === '/forget' ? false:true" style="display: none;">
      <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
         <router-link to="/home" class="sidebar-brand d-flex align-items-center justify-content-center" >
          <div class="sidebar-brand-icon">
            <img src="{{asset('backend/img/logo/admin-user.jpg')}}">
          </div>
          <div class="sidebar-brand-text mx-3">Inventory Management</div>
         </router-link>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
          <router-link to="/home" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></router-link>
        </li>
        <li class="nav-item ">
          <router-link to="/pos" class="nav-link">
            <i class="fas fa-cart-plus"></i>
            <span class="">POS</span></router-link>
        </li>
        <hr class="sidebar-divider">
        
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmployee"
            aria-expanded="true" aria-controls="collapseEmployee">
            <i class="fas fa-user-tie"></i>
            <span>Employee</span>
          </a>
          <div id="collapseEmployee" class="collapse" aria-labelledby="collapseEmployee" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Employee</h6>
              <router-link to="/create-employee" class="collapse-item"> Add Employee </router-link>
              <router-link to="/employee" class="collapse-item"> All Employee </router-link>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
            aria-controls="collapseForm">
            <i class="fas fa-user-tie"></i>
            <span>Supplier</span>
          </a>
          <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Supplier</h6>
              <router-link to="/create-supplier" class="collapse-item">Add Supplier</router-link>
              <router-link to="/supplier" class="collapse-item">All Supplier</router-link>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer" aria-expanded="true"
            aria-controls="collapsePage">
            <i class="fas fa-user-tag"></i>
            <span>Customer</span>
          </a>
          <div id="collapseCustomer" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Example Pages</h6>
              <router-link to="/create-customer" class="collapse-item">Create Customer</router-link>
              <router-link to="/customer" class="collapse-item" >All Customer</router-link>  
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Category</span>
          </a>
          <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Tables</h6>
              <router-link to="/create-category" class="collapse-item" >Create Category</router-link>
              <router-link to="/category" class="collapse-item" >All Category </router-link>
            </div>
          </div>
        </li>
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExpense" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Expense</span>
          </a>
          <div id="collapseExpense" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Expenses</h6>
              <router-link to="/create-expense" class="collapse-item" >Create Expense</router-link>
              <router-link to="/expense" class="collapse-item" >Expense Sheet </router-link>
            </div>
          </div>
        </li
        <hr class="sidebar-divider">
       
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span>
          </a>
          <div id="collapseOrder" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Orders</h6>
              <router-link to="/order" class="collapse-item" >Todays Order</router-link>
              <router-link to="/search" class="collapse-item" >Search </router-link>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSalary" aria-expanded="true"
            aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Salary</span>
          </a>
          <div id="collapseSalary" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Example Pages</h6>
              <router-link to="/given-salary" class="collapse-item">Add Salary</router-link>
              <router-link to="/salary" class="collapse-item" >All Salary</router-link>  
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
            aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Product</span>
          </a>
          <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Example Pages</h6>
              <router-link to="/create-product" class="collapse-item">Create Product</router-link>
              <router-link to="/product" class="collapse-item" >All Products</router-link>  
            </div>
          </div>
        </li>
        <li class="nav-item">
          <router-link to="/stock" class="nav-link">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Product Stock </span>
          </router-link>
        </li>
        
       
      
        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin"></div>
      </ul>
      <!-- Sidebar -->
      </nav>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter">2</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                      having.</div>
                    <div class="small text-gray-500">Udin Cilok · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/girl.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-default"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
                      say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Jaenab · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-tasks fa-fw"></i>
                <span class="badge badge-success badge-counter">3</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Task
                </h6>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Design Button
                      <div class="small float-right"><b>50%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Make Beautiful Transitions
                      <div class="small float-right"><b>30%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Create Pie Chart
                      <div class="small float-right"><b>75%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">View All Taks</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{asset('backend/img/logo/admin-user.jpg')}}" style="max-width: 60px">
                <router-link to="/logout" class="btn btn-sm" >Logout</router-link>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          
          <router-view> </router-view>
         

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      
    </div>
  </div>
  </div>


  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset('js/app.js')}}"
  <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>  
  <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('backend/js/ruang-admin.js')}}"></script>
  <script type="text/javascript">
    let token = localStorage.getItem('token'); 
    if(token){
    $("#sidebar").css("display","");
    $("#topbar").css("display","");
    } 
</body>

</html>