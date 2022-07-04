require('./bootstrap');

import VueRouter from 'vue-router'
import LoadScript from 'vue-plugin-load-script';

// Admin
import Level from './components/user/Level';
import Dashboard from './components/user/Dashboard';
import Licence from './components/user/Licence';
import CV from './components/user/CV';
import Billing from './components/user/Billing';

// Globat Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

// Vue Router
Vue.use(VueRouter)
Vue.use(LoadScript);

const routes = [

  // Teacher
  { path: '/teacher/dashboard', component: Dashboard },
  { path: '/teacher/level', component: Level },
  { path: '/teacher/licence', component: Licence },
  { path: '/teacher/billing', component: Billing },
  { path: '/teacher/cv', component: CV },
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
