import Vue from 'vue';
import VueRouter from 'vue-router';

import MainPage from '../views/MainPage.vue';
import Upload from '../views/Upload.vue'
import Profile from '../views/Profile.vue'
import Login from '../views/Login.vue'
import About from '../views/About.vue'
import Cart from '../views/Cart.vue'


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
      path: '/krepselis',
      name: 'Cart',
      component: Cart
    },
    {
      path: '/profilis',
      name: 'Profile',
      component: Profile
    }
  ]
});