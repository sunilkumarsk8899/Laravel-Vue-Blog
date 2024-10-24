import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css'; // You can choose any available theme


// Import your bootstrap file if needed
import './bootstrap';

createApp(App)
    .use(router)
    .mount('#app');
