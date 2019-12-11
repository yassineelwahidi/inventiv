require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

Vue.component('app-home', require('./components/AppHome.vue').default);

const routes = [
    { path: '/blog', component: require('./components/blog/Blog.vue').default },
    { path: '/post/add', component: require('./components/blog/Add.vue').default ,name: 'post.create'},

    { path: '/offers', component: require('./components/carriere/Offers.vue').default },
    { path: '/offer/add', component: require('./components/carriere/Add.vue').default ,name: 'offer.create'},

    { path: '/login', component: require('./components/auth/Login.vue').default, name:'login' },
    { path: '/signup', component: require('./components/auth/Signup.vue').default, name:'signup' },
    { path: '/logout', component: require('./components/auth/Logout.vue').default, name:'logout' },
];

const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
});

const app = new Vue({
    router
}).$mount('#app');

