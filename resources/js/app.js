/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import VueRouter from 'vue-router';
import VuePageTransition from 'vue-page-transition';
import VueMq from 'vue-mq';
import VueCookies from 'vue-cookies';
<<<<<<< HEAD
import DragDrop from 'vue-drag-n-drop';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
=======
import { library } from '@fortawesome/fontawesome-svg-core';
import { faUserSecret } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Vuesax from 'vuesax';
import 'vuesax/dist/vuesax.css';
>>>>>>> 016fd7772fec9282a404b64863e148ac839f1329

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(VuePageTransition);
Vue.use(VueMq);
Vue.use(VueCookies);
<<<<<<< HEAD
Vue.use(DragDrop);
=======

Vue.use(Vuesax, {
  // options here
})
>>>>>>> 016fd7772fec9282a404b64863e148ac839f1329

Vue.use(VueMq, {
    breakpoints: { // default breakpoints - customize this
      sm: 500,
      md: 1250,
      lg: Infinity,
    },
    defaultBreakpoint: 'sm' // customize this for SSR
  })

library.add(faUserSecret)

plugins: [
  {
    src: './plugins/vue-drag-n-drop.js',
    ssr: false
  }
],


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('index-component', require('./components/IndexComponent.vue').default);
Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import dashboard from './components/DashboardComponent.vue';
 import builder from './components/BuilderComponent.vue';
 import spapageone from './components/SpaPageOneComponent.vue';
 import spapagetwo from './components/SpaPageTwoComponent.vue';


 const routes = [
    {path : '/builder', name: 'builder', component: builder},
    {path : '/spapageone', name: 'spapageone', component: spapageone},
    {path : '/spapagetwo', name: 'spapagetwo', component: spapagetwo},
    {path : '/*', name: 'dashboard', component: dashboard},
 ]

const router = new VueRouter({
    mode: 'history',
    routes,
});

const app = new Vue({
    el: '#app',
    router
});

router.beforeResolve((to, from, next) => {
    // If this isn't an initial page load.
    if (to.name) {
      // Start the route progress bar.
      NProgress.start()
    }
    next()
  })
  
  router.afterEach((to, from) => {
    // Complete the animation of the route progress bar.
    NProgress.done()
  })