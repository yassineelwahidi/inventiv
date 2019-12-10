require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);





Vue.component('app-home', require('./AppHome.vue').default);



const routes = [


    { path: '/user', component: require('./components/User.vue').default },
    { path: '/ex', component: require('./components/ExampleComponent.vue').default }
];

const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
});

const app = new Vue({
    router
}).$mount('#app');

