import Vue from 'vue';
import VueRouter from 'vue-router';

import MainPage from '../views/MainPage.vue';
import Upload from '../views/Upload.vue'
import Profile from '../views/Profile.vue'
import Login from '../views/Login.vue'
import About from '../views/About.vue'
import Cart from '../views/Cart.vue'
import AddProduct from '../views/AddProduct.vue'
import Edit from '../views/Edit.vue'
import Coupons from '../views/Coupons.vue'
import Questions from '../views/Questions.vue'
import Orders from '../views/Orders.vue'

Vue.use(VueRouter);

export default new VueRouter({
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
    }
  ]
});