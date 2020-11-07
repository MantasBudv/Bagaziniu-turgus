import Vue from 'vue';
import VueRouter from 'vue-router';

import MainPage from '../views/MainPage.vue';
import Upload from '../views/Upload.vue'


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
      path: '/upload',
      name: 'Upload',
      component: Upload
    }
  ]
});