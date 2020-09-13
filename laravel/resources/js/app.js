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
Vue.component('login-text', require('./components/ui-elements/Login.vue').default);

Vue.component('logo', require('./components/ui-elements/Logo.vue').default);
Vue.component('input-vue', require('./components/ui-elements/InputVue.vue').default);
Vue.component('modal', require('./components/ui-elements/Modal.vue').default);
Vue.component('calendar', require('./components/ui-elements/Calendar.vue').default);
Vue.component('categories', require('./components/ui-elements/Categories').default);
Vue.component('exercise-categories', require('./components/ui-elements/ExerciseCategories').default);
/*Вывод календаря на отдельную дату*/
Vue.component('calendar-day', require('./components/ui-elements/day-one-elems/CurrentDate.vue').default);
Vue.component('add-exercise', require('./components/ui-elements/day-one-elems/AddExercise').default);

/*Блок "Мои программы"*/
Vue.component('my-programs-index', require('./components/ui-elements/my-programs/MyProgramsIndex').default);
Vue.component('my-programs-one', require('./components/ui-elements/my-programs/MyProgramsOne').default);
Vue.component('my-programs-update', require('./components/ui-elements/my-programs/MyProgramsUpdate').default);
Vue.component('my-programs-create', require('./components/ui-elements/my-programs/MyProgramsCreate').default);

const app = new Vue({
    el: '#app',
});
