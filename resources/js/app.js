require('./bootstrap');

import Vue from 'vue';
Vue.component('pagination', require('laravel-vue-pagination'));
import VueRouter from 'vue-router';


Vue.use(VueRouter)

import App from './components/App';
import PostsIndex from './components/Posts/index';
import Post from './components/Posts/post';
import PostCreate from './components/Posts/create';




const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path:'/',
            component: PostsIndex,
            name:'posts.index'
        },
        {
            path:'/post/:slug',
            component: Post,
            name:'post',
        },
        {
            path:'/posts/create',
            component: PostCreate,
            name:'posts.create',
        },

    ]
})

const app = new Vue({
    el:'#app',
    components: {App},
    router
});
