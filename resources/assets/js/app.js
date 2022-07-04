require('./bootstrap');

import VueRouter from 'vue-router'

// Admin
import Questions from './components/admin/Question';
import EditQuestion from './components/admin/questions/EditQuestion';
import TIFQuestions from './components/admin/TIFQuestion';
import Dashboard from './components/admin/Dashboard';
import Product from './components/admin/Product';
import Pages from './components/admin/Pages';
import PageCreate from './components/admin/pages/PageCreate';
import PageEdit from './components/admin/pages/PageEdit';
import Users from './components/admin/Users';
import License from './components/admin/License';
import TIF from './components/admin/TIF';

// Globat Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

// Laravel Passport Client

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

// Vue Router
Vue.use(VueRouter)

const routes = [

  // Admin
  { path: '/admin/dashboard', component: Dashboard },
  { path: '/admin/questions', component: Questions },
  { path: '/admin/questions/:id', name: 'questionEdit', component: EditQuestion },
  { path: '/admin/tif-questions', component: TIFQuestions },
  { path: '/admin/products', component: Product },
  { path: '/admin/pages', component: Pages },
  { path: '/admin/pages-create', component: PageCreate },
  { path: '/admin/pages/:id', name: 'pageEdit', component: PageEdit },
  { path: '/admin/users', component: Users },
  { path: '/admin/license-categories', component: License },
  { path: '/admin/teacher-impact-factor', component: TIF },

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
