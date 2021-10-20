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
import VueDragDrop from 'vue-drag-n-drop';
import draggable from 'vuedraggable';
import VueApexCharts from 'vue-apexcharts';
import {Tabs, Tab} from 'vue-tabs-component';
import VTooltip from 'v-tooltip';
import 'v-tooltip/dist/v-tooltip.css';



require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(VuePageTransition);
Vue.use(VueMq);
Vue.use(VueCookies);
Vue.use(VueDragDrop);
Vue.use(draggable);
Vue.use(VueApexCharts);
Vue.use(VTooltip);

Vue.use(VueMq, {
    breakpoints: { // default breakpoints - customize this
      sm: 500,
      md: 1250,
      lg: Infinity,
    },
    defaultBreakpoint: 'sm' // customize this for SSR
  })

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

Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('indexlogin-component', require('./components/IndexloginComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('builder-component', require('./components/BuilderComponent.vue').default);
Vue.component('apexchart', VueApexCharts);
Vue.component('draggable', draggable);
Vue.component('drag-drop', VueDragDrop);
Vue.component('drag', VueDragDrop.Drag);
Vue.component('drop', VueDragDrop.Drop);
Vue.component('tabs', Tabs);
Vue.component('tab', Tab);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import login from './components/LoginComponent.vue';
 import dashboard from './components/DashboardComponent.vue';
 import funnel from './components/FunnelComponent.vue';
 import buildfunnel from './components/BuildfunnelComponent.vue';
 import createfunnel from './components/CreatefunnelComponent.vue';
 import archievesteps from './components/ArchievestepsComponent.vue';
 import marketplace from './components/MarketplaceComponent.vue';
 import membership from './components/MembershipComponent.vue';
 import analytics from './components/AnalyticsComponent.vue';
 import heatmaps from './components/HeatmapsComponent.vue';
 import edituser from './components/EdituserComponent.vue';
 import pages from './components/PagesComponent.vue';
 import strategies from './components/StrategiesComponent.vue';


const routes = [
  {path : '/login', name: 'login', component: login},
  {path : '/register', name: 'register', component: login},  
  {path : '/funnel', name: 'funnel', component: funnel},
  {path : '/build-funnel', name: 'buildfunnel', component: buildfunnel},
  {path : '/create-funnel', name: 'createfunnel', component: createfunnel},
  {path : '/archieve-steps', name: 'archievesteps', component: archievesteps},
  {path : '/marketplace', name: 'marketplace', component: marketplace},
  {path : '/pages', name: 'pages', component: pages},
  {path : '/strategies', name: 'strategies', component: strategies},
  {path : '/membership', name: 'membership', component: membership},
  {path : '/analytics', name: 'analytics', component: analytics},
  {path : '/heat-maps', name: 'heatmaps', component: heatmaps},
  {path : '/edit-user', name: 'edituser', component: edituser},
  {path : '/*', name: 'dashboard', component: dashboard},
]

const router = new VueRouter({
  mode: 'history',
  routes,
});


const app = new Vue({
  el: '#app',
  router,
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