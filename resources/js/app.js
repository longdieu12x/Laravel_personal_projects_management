

require('./bootstrap');

window.Vue = require('vue');
import store from './store/index';


//** Declare vue components */
Vue.component('app-component', require('./components/App.vue').default);
Vue.component('body-component', require('./components/Body.vue').default);
Vue.component('leftbody-component', require('./components/LeftBody.vue').default);
Vue.component('rightbody-component', require('./components/RightBody.vue').default);
Vue.component('project-component', require('./components/CreateProject.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    store,
});



// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
