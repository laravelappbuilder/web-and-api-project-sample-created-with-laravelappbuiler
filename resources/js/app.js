
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
window.axios = require('axios');
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

Vue.component('navbar',require('./components/Navbar.vue').default);
Vue.component('login',require('./components/auth/Login.vue').default);
Vue.component('register',require('./components/auth/Register.vue').default);
Vue.component('app',require('./components/App.vue').default);
Vue.component('profile',require('./components/Profile.vue').default);
Vue.component('role-index',require('./components/roles/RoleIndex.vue').default);
Vue.component('role-create',require('./components/roles/RoleCreate.vue').default);
Vue.component('role-show',require('./components/roles/RoleShow.vue').default);
Vue.component('role-edit',require('./components/roles/RoleEdit.vue').default);
Vue.component('category-index',require('./components/categories/CategoryIndex.vue').default);
Vue.component('category-create',require('./components/categories/CategoryCreate.vue').default);
Vue.component('category-show',require('./components/categories/CategoryShow.vue').default);
Vue.component('category-edit',require('./components/categories/CategoryEdit.vue').default);
Vue.component('post-index',require('./components/posts/PostIndex.vue').default);
Vue.component('post-create',require('./components/posts/PostCreate.vue').default);
Vue.component('post-show',require('./components/posts/PostShow.vue').default);
Vue.component('post-edit',require('./components/posts/PostEdit.vue').default);
Vue.component('comment-index',require('./components/comments/CommentIndex.vue').default);
Vue.component('comment-create',require('./components/comments/CommentCreate.vue').default);
Vue.component('comment-show',require('./components/comments/CommentShow.vue').default);
Vue.component('comment-edit',require('./components/comments/CommentEdit.vue').default);
Vue.component('like-index',require('./components/likes/LikeIndex.vue').default);
Vue.component('like-create',require('./components/likes/LikeCreate.vue').default);
Vue.component('like-show',require('./components/likes/LikeShow.vue').default);
Vue.component('like-edit',require('./components/likes/LikeEdit.vue').default);
Vue.component('rating-index',require('./components/ratings/RatingIndex.vue').default);
Vue.component('rating-create',require('./components/ratings/RatingCreate.vue').default);
Vue.component('rating-show',require('./components/ratings/RatingShow.vue').default);
Vue.component('rating-edit',require('./components/ratings/RatingEdit.vue').default);
Vue.component('tag-index',require('./components/tags/TagIndex.vue').default);
Vue.component('tag-create',require('./components/tags/TagCreate.vue').default);
Vue.component('tag-show',require('./components/tags/TagShow.vue').default);
Vue.component('tag-edit',require('./components/tags/TagEdit.vue').default);

let routes = [
    {path: '/login',name : 'login', component : require('./components/auth/Login.vue').default},
    {path: '/register',name : 'register', component : require('./components/auth/Register.vue').default},
    {path: '/profile',name : 'profile', component : require('./components/Profile.vue').default,meta:{requiresAuth:true}},
    {path: '/roles',name: 'role-index', component : require('./components/roles/RoleIndex.vue').default},
		{path: '/roles/create',name : 'role-create', component : require('./components/roles/RoleCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/roles/:id',name : 'role-show', component : require('./components/roles/RoleShow.vue').default},
		{path: '/roles/:id/edit',name : 'role-edit',component : require('./components/roles/RoleEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/categories',name: 'category-index', component : require('./components/categories/CategoryIndex.vue').default},
		{path: '/categories/create',name : 'category-create', component : require('./components/categories/CategoryCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/categories/:id',name : 'category-show', component : require('./components/categories/CategoryShow.vue').default},
		{path: '/categories/:id/edit',name : 'category-edit',component : require('./components/categories/CategoryEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/posts',name: 'post-index', component : require('./components/posts/PostIndex.vue').default},
		{path: '/posts/create',name : 'post-create', component : require('./components/posts/PostCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/posts/:slug',name : 'post-show', component : require('./components/posts/PostShow.vue').default},
		{path: '/posts/:slug/edit',name : 'post-edit',component : require('./components/posts/PostEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/comments',name: 'comment-index', component : require('./components/comments/CommentIndex.vue').default},
		{path: '/comments/create',name : 'comment-create', component : require('./components/comments/CommentCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/comments/:id',name : 'comment-show', component : require('./components/comments/CommentShow.vue').default},
		{path: '/comments/:id/edit',name : 'comment-edit',component : require('./components/comments/CommentEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/likes',name: 'like-index', component : require('./components/likes/LikeIndex.vue').default},
		{path: '/likes/create',name : 'like-create', component : require('./components/likes/LikeCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/likes/:id',name : 'like-show', component : require('./components/likes/LikeShow.vue').default},
		{path: '/likes/:id/edit',name : 'like-edit',component : require('./components/likes/LikeEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/ratings',name: 'rating-index', component : require('./components/ratings/RatingIndex.vue').default},
		{path: '/ratings/create',name : 'rating-create', component : require('./components/ratings/RatingCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/ratings/:id',name : 'rating-show', component : require('./components/ratings/RatingShow.vue').default},
		{path: '/ratings/:id/edit',name : 'rating-edit',component : require('./components/ratings/RatingEdit.vue').default,meta:{requiresAuth:true}},
		{path: '/tags',name: 'tag-index', component : require('./components/tags/TagIndex.vue').default},
		{path: '/tags/create',name : 'tag-create', component : require('./components/tags/TagCreate.vue').default,meta:{requiresAuth:true}},
		{path: '/tags/:id',name : 'tag-show', component : require('./components/tags/TagShow.vue').default},
		{path: '/tags/:id/edit',name : 'tag-edit',component : require('./components/tags/TagEdit.vue').default,meta:{requiresAuth:true}},
];

const router = new VueRouter({
  routes
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth)
    if (localStorage.getItem('loggedin')=='true') {
      next()
    }else {
      next({ name: 'login' })
    }
  else
    if (to.name=='login' || to.name=='register') {
      if (localStorage.getItem('loggedin')=='true') {
        next({name:'profile'})
      }else {
        next()
      }
    }else {
      next()
    }
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
