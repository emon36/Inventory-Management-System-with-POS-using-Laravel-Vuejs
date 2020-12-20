let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let logout = require('./components/auth/logout.vue').default;
let forget = require('./components/auth/forgetPassword.vue').default;
let Home = require('./components/Home.vue').default;

//Employee component

let createEmployee = require('./components/Employee/create.vue').default;
let employee = require('./components/Employee/index.vue').default;
let editEmployee = require('./components/Employee/edit.vue').default;

//supplier component

let createSupplier = require('./components/Supplier/create.vue').default;
let supplier = require('./components/Supplier/index.vue').default;
let editSupplier = require('./components/Supplier/edit.vue').default;

//category component

let createCategory = require('./components/Category/create.vue').default;
let category = require('./components/Category/index.vue').default;
let editCategory = require('./components/Category/edit.vue').default;

//product component

let createProduct = require('./components/Product/create.vue').default;
let product = require('./components/Product/index.vue').default;
let editProduct = require('./components/Product/edit.vue').default;

//Expense component

let createExpense = require('./components/Expense/create.vue').default;
let expense = require('./components/Expense/index.vue').default;
let editExpense = require('./components/Expense/edit.vue').default

//salary 

let salary  = require('./components/Salary/all_Employee.vue').default;
let paySalary = require('./components/Salary/create.vue').default;
let allSalary = require('./components/Salary/index.vue').default;

let viewSalary = require('./components/Salary/view.vue').default;
let editSalary = require('./components/Salary/edit.vue').default;

//product stock

let stock = require('./components/Product/stock.vue').default;
let editStock = require('./components/Product/edit_stock.vue').default;


//Customer component

let createCustomer = require('./components/Customer/create.vue').default;
let customer = require('./components/Customer/index.vue').default;
let editCustomer = require('./components/Customer/edit.vue').default;
//pos
let pos = require('./components/pos/pointofsale.vue').default;

//order

let order = require('./components/Order/order.vue').default;
let viewOrder = require('./components/Order/vieworder.vue').default;
let search = require('./components/Order/search.vue').default;









export const routes = [
    { path: '/', component:login, name:'/' },
    { path: '/register', component: register , name:'register'},
    { path: '/reset', component: forget , name:'forget'},
    { path: '/logout', component: logout , name:'logout'},
    { path: '/home', component: Home , name:'Home'},

    //emplyee 
    { path: '/create-employee', component: createEmployee , name:'create-employee'},
    { path: '/employee', component: employee , name:'employee'},
    { path: '/edit-employee/:id', component: editEmployee , name:'edit-employee'},

    //supplier  
    { path: '/create-supplier', component: createSupplier , name:'create-supplier'},
    { path: '/supplier', component: supplier , name:'supplier'},
    { path: '/edit-supplier/:id', component: editSupplier , name:'edit-supplier'},

    //category

    { path: '/create-category', component: createCategory , name:'create-category'},
    { path: '/category', component: category , name:'category'},
    { path: '/edit-category/:id', component: editCategory , name:'edit-category'},

    //product

    { path: '/create-product', component: createProduct , name:'create-product'},
    { path: '/product', component: product , name:'product'},
    { path: '/edit-product/:id', component: editProduct , name:'edit-product'},


    //Expense 

    { path: '/create-expense', component: createExpense , name:'create-expense'},
    { path: '/expense', component: expense , name:'expense'},
    { path: '/edit-expense/:id', component: editExpense , name:'edit-expense'},

//salary
    { path: '/given-salary', component: salary , name:'given-salary'},
    { path: '/pay-salary/:id', component: paySalary , name:'pay-salary'},
    { path: '/salary', component: allSalary , name:'allSalary'},
    { path: '/view-salary/:id', component: viewSalary , name:'view-salary'},
    { path: '/edit-salary/:id', component: editSalary , name:'edit-salary'},

    //product stock
    { path: '/stock', component: stock , name:'stock'},
    { path: '/edit-stock/:id', component: editStock , name:'edit-stock'},


     //customer 
     { path: '/create-customer', component: createCustomer , name:'create-customer'},
     { path: '/customer', component: customer , name:'customer'},
     { path: '/edit-customer/:id', component: editCustomer , name:'edit-customer'},
      //pos
     { path: '/pos', component: pos , name:'pos'},

     //order

     { path: '/order', component: order , name:'order'},
     { path: '/view/order/:id', component: viewOrder , name:'view-order'},

     { path: '/search', component: search , name:'search'},


  ]