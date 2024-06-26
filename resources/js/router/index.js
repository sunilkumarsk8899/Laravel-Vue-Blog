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
