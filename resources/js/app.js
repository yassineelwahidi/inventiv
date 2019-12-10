require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

Vue.component('app-home', require('./components/AppHome.vue').default);

const routes = [
    { path: '/blog', component: require('./components/blog/Blog.vue').default },
    { path: '/carriere', component: require('./components/carriere/Carriere.vue').default }
];

const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
});

const app = new Vue({
    router
}).$mount('#app');

