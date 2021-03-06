import Vue from 'vue';
import VueRouter from 'vue-router';

import MainPage from '../views/MainPage.vue';
import Upload from '../views/Upload.vue'
import Profile from '../views/Profile.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import About from '../views/About.vue'
import Cart from '../views/Cart.vue'
import AddProduct from '../views/AddProduct.vue'
import AddPayment from '../views/AddPayment.vue'
import Edit from '../views/Edit.vue'
import Coupons from '../views/Coupons.vue'
import Questions from '../views/Questions.vue'
import Orders from '../views/Orders.vue'
import OrdersR from '../views/OrdersR.vue'

Vue.use(VueRouter);


const router = new VueRouter({
  mode: 'history',
  routes:[
    {
        path: '/', 
        name: 'MainPage', 
        component: MainPage
    },
    {
      path: '/prisijungimas',
      name: 'Login',
      component: Login
    },
    {
      path: '/registracija',
      name: 'Register',
      component: Register
    },
    {
      path: '/ikelti',
      name: 'Upload',
      component: Upload
    },
    {
      path: '/aprasymas/:id',
      name: 'About',
      component: About
    },
    {
      path: '/klausimai',
      name: 'Questions',
      component: Questions
    },
    {
      path: '/redagavimas/:id',
      name: 'Edit',
      component: Edit
    },
    {
      path: '/nuolaidos',
      name: 'Coupons',
      component: Coupons
    },
    {
      path: '/prideti',
      name: 'AddProduct',
      component: AddProduct
    },
    {
      path: '/pridetiBuda',
      name: 'AddPayment',
      component: AddPayment
    },
    {
      path: '/krepselis',
      name: 'Cart',
      component: Cart
    },
    {
      path: '/profilis',
      name: 'Profile',
      component: Profile
    },
    {
      path: '/uzsakymai',
      name: 'Orders',
      component: Orders
    },
    {
      path: '/uzsakymu_red',
      name: 'OrdersR',
      component: OrdersR
    }
  ]
})

export default router