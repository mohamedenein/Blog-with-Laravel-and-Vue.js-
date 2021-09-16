require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import App from './components/App';
import PostIndex from './components/Posts/index';


const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path:'/',
            component: PostIndex,
            name:'posts.index'
        },
    ]
})

const app = new Vue({
    el:'#app',
    components: {App},
    router
});
