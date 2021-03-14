require('./bootstrap');
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import router from './routes.js'
import Vuetify from 'vuetify'
import "vuetify/dist/vuetify.min.css";
import App from './components/App.vue'
import store from './store/index.js'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify, {
    theme: {
      themes: {
        light: {
          primary: "#3F51B5",
          secondary: "#B0BEC5",
          accent: "#8C9EFF",
          error: "#B71C1C"
        }
      },
      
    },
    // icons: {
    //   iconfont: 'mdi', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
    // },
  });
window.Vue = require('vue');
Vue.use(VueAxios, axios);
Vue.use(VueRouter)
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('hello', require('./components/Hello.vue').default);
const app = new Vue({
    el: '#app',
    router,
    store,
    // Vuetify,
    vuetify: new Vuetify({
      icons: {
        iconfont: 'mdi', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
      },
    }),
    render: h => h(App),
    // render: h => h(Hello),
});
