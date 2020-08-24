window.Vue = require('vue');

window.axios = require('axios');
Vue.use(axios);

Vue.component('registration', require('./components/auth/Registration.vue').default);
Vue.component('login', require('./components/auth/Login.vue').default);


Vue.component('input-vue', require('./components/ui-elements/InputVue.vue').default);
Vue.component('modal', require('./components/ui-elements/Modal.vue').default);

const app = new Vue({
    el: '#app',
});

