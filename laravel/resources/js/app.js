/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./script');

window.Vue = require('vue');

window.axios = require('axios');
Vue.use(axios);

Vue.component('registration', require('./components/auth/Registration.vue').default);
Vue.component('login', require('./components/auth/Login.vue').default);


Vue.component('input-vue', require('./components/ui-elements/InputVue.vue').default);
Vue.component('modal', require('./components/ui-elements/Modal.vue').default);
Vue.component('calendar', require('./components/ui-elements/Calendar.vue').default);
Vue.component('categories', require('./components/ui-elements/Categories').default);

const app = new Vue({
    el: '#app',
});
