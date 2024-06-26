(1) laravel new (project_name)
(2) php artisan serve
(3) npm install vue-router
(4) npm install
(5) npm install @vitejs/plugin-vue
(6) npm install vue-router@next
(7) npm run dev


change in files
(1) app.js -> 
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

// Import your bootstrap file if needed
import './bootstrap';

createApp(App)
    .use(router)
    .mount('#app');


(2) router/index.js ->
import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';
import AboutUs from '../components/About_Us.vue';
import NotFound from '../NotFound.vue';


const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    },
    {
        path: '/about-us',
        component: AboutUs
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;


(3) App.vue -> 
<template>
    <div>
      <nav>
        <router-link to="/">Home</router-link>
        <router-link to="/about-us">About Us</router-link>
      </nav>
      <router-view></router-view>
    </div>
  </template>

  <script>
  export default {
    name: 'App',
  };
  </script>

  <style>
  nav {
    margin-bottom: 1em;
  }
  nav a {
    margin-right: 1em;
    text-decoration: none;
    color: #3490dc;
  }
  nav a.router-link-exact-active {
    font-weight: bold;
    color: #ffed4a;
  }
  </style>


(4) routes/web.php -> 
1) Route::get('/{pathMatch}',function(){
    return view('welcome');
})->where('pathMatch',".*");

2) Route::get('/{any}',function(){
    return view('welcome');
})->where('any','.*');



(5) vite.config.js ->

import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

