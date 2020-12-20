/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//user class import globaly
import User from './Helpers/User';
window.User = User;
//routes import
import {routes} from './routes'; 

//sweet alert import
import Swal from 'sweetalert2'
window.Swal = Swal;

//noty alert import
import Notification from './Helpers/Notification';
window.Notification = Notification;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});


import VueHtmlToPaper from 'vue-html-to-paper';
 window.VueHtmlToPaper = VueHtmlToPaper;


const options = {
  name: '_blank',
  specs: [
    'fullscreen=yes',
    'titlebar=yes',
    'scrollbars=yes'
  ],
  styles: [
    'https://http://127.0.0.1:8000/css/app.css',
    'http://127.0.0.1:8000/backend/vendor/bootstrap/css/bootstrap.min.css',
    'http://127.0.0.1:8000/backend/css/ruang-admin.min.css'

    
  ]
}
Vue.use(VueHtmlToPaper, options);

window.Toast = Toast;

window.Reload = new Vue();




//sweet alert end

const router = new VueRouter({
    routes, 
    
    mode: "history"
  })
  
 



const app = new Vue({
    el: '#app',
    router
});
