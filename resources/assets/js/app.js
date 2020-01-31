
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.config.productionTip = false

import { Form, HasError, AlertError } from 'vform';



window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)




import VueRouter from 'vue-router'
Vue.use(VueRouter)


let routes=[

{path:'/emp',component:require('./components/emp.vue')},
{path:'/Presence',component:require('./components/presence.vue')},
{path:'/test',component:require('./components/test.vue')},
{path:'/start',component:require('./components/start.vue')},
{path:'/inactive',component:require('./components/inactive.vue')},
{path:'/filtre',component:require('./components/filtre.vue')},
{path:'/test_calcul_temps',component:require('./components/test_calcul_temps.vue')},
{path:'/alert',component:require('./components/alert.vue')},

{path:'/details/:teamId',component:require('./components/details.vue')},
{path:'/info/:teamId',component:require('./components/info.vue')}

]



const router=new VueRouter({
	mode:'history',
	routes
})


window.Fire=new Vue();


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('app-greeter,hamza');
const app = new Vue({
    el: '#app',
    router
});
