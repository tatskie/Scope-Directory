import Vue from 'vue';
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';
import VueProgressBar from 'vue-progressbar';
import swal from 'sweetalert2';
import { objectToFormData } from 'object-to-formdata';

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

const Toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.Vue = Vue;
window.Form = Form;
window.swal = swal;
window.Toast = Toast;
window.Fire = new Vue();
window.objectToFormData = objectToFormData;


const options = {
  color: '#bffaf3',
  failedColor: '#874b4b',
  thickness: '5px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'left',
  inverse: false
}

Vue.use(VueProgressBar, options);

Vue.filter('upText', function(text){
	return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('formatDate', function(text){
  if (text) {
    return moment(String(text)).format('MM/DD/YYYY')
  }
});

Vue.filter('diffHum', function(date){
	return moment(date).startOf('day').fromNow();
});

Vue.filter('date', function(date){
  return moment(date).format('LL');
});

window._ = require('lodash');
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// in test server 
// it will fixed all in subfolder
// window.axios.defaults.baseURL = 'https://www.tesol-licence.education/staging/';
