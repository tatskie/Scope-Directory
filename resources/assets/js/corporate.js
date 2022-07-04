require('./bootstrap');

import VueRouter from 'vue-router'

// Corporate
import Dashboard from './components/corporate/Dashboard';

// Globat Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

// Vue Router
Vue.use(VueRouter)

const routes = [
  // Corporate
  { path: '/corporate/dashboard', component: Dashboard }
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
