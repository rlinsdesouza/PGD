
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.VueResource = require('vue-resource');
window.BootstrapVue = require('bootstrap-vue');
// window.ElementUI = require ('element-ui');

window.Vue.use(window.VueResource);
window.Vue.use(window.BootstrapVue);
// window.Vue.use(window.ElementUI);

import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/pt-br'
import '../sass/element-styles-variables.scss'
Vue.use(ElementUI, { locale });


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('bcomplete-table', require('./components/bcompletetable').default);
Vue.component('modal-exclusao', require('./components/modalexclusao').default);
Vue.component('date-picker', require('./components/datepicker').default);
Vue.component('transfer-component', require('./components/transfer').default);








/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
