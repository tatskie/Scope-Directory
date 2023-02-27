require('./bootstrap');

import VueRouter from 'vue-router'
import LoadScript from 'vue-plugin-load-script';

// Teacher
import Level from './components/user/editor/Level';
import Dashboard from './components/user/editor/Dashboard';
import Licence from './components/user/Licence';
import CV from './components/user/CV';
import Billing from './components/user/editor/Billing';
import Profile from './components/user/editor/Profile';
import Card from './components/user/editor/Ordercard';

// Globat Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

// Vue Router
Vue.use(VueRouter)
Vue.use(LoadScript);

const routes = [

  // Teacher
  { path: '/editor/dashboard', component: Dashboard },
  { path: '/editor/level', component: Level },
  { path: '/editor/licence', component: Licence },
  { path: '/editor/billing', component: Billing },
  { path: '/editor/cv', component: CV },
  { path: '/editor/profile', component: Profile },
  { path: '/editor/order-card', component: Card },
]

import Table from './components/common/table/Table.vue'
import TableTr from './components/common/table/TableTr'
import TableTd from './components/common/table/TableTd'


const router = new VueRouter({
    mode: 'history',
    // base: "/staging/", // for subfolder
    routes // short for `routes: routes`
})

Vue.component(Table.name, Table)
Vue.component(TableTr.name, TableTr)
Vue.component(TableTd.name, TableTd)

const app = new Vue({
    el: '#app',
    router
});
