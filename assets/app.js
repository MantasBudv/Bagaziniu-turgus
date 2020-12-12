import "./styles/app.scss"
import Vue from "vue";
import App from './App.vue'
import axios from "axios";
import router from "./router";
import { store } from "./store/store";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
Vue.use(axios)
window.axios = axios;

Vue.config.productionTip = false;

const app = new Vue({
    el: "#app",
    store: store,
    router: router,
    render: h => h(App)
});

export default app;