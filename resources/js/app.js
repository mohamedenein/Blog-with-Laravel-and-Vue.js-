import Vue from 'vue';

require('./bootstrap');

Vue.component('posts-index',require('./components/Posts/index').default)

const app = new Vue({
    el:'#app'
});
