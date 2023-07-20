/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/LoginForm.vue';
import HomeComponent from './components/front/Home.vue';
import AdComponent from './components/front/Ad.vue';
import AdsComponent from './components/front/Ads.vue';
import SellersComponent from './components/front/Sellers.vue';
import UserComponent from './components/back/users/User.vue';
import NewAdComponent from './components/back/users/NewAd.vue';
import AdminComponent from './components/back/admin/Admin.vue';
import AllAdsComponent from './components/back/admin/AllAds.vue';
import UsersComponent from './components/back/admin/Users.vue';
import MyAdsComponent from './components/back/users/MyAds.vue';
import ArticleComponent from './components/front/Article.vue';


app.component('login-form', ExampleComponent);
app.component('home', HomeComponent);
app.component('ad', AdComponent);
app.component('ads', AdsComponent);
app.component('sellers', SellersComponent);
app.component('user', UserComponent);
app.component('new-ad', NewAdComponent);
app.component('admin', AdminComponent);
app.component('all-ads', AllAdsComponent);
app.component('users', UsersComponent);
app.component('my-ads', MyAdsComponent);
app.component('Articlee', ArticleComponent);

app.mount('#app');
