import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';
import AboutUs from '../components/About_Us.vue';
import NotFound from '../NotFound.vue';
import Blog from '../components/Blog.vue';
import Contact_Us from '../components/Contact_Us.vue';


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
    },
    {
        path: '/blog',
        component: Blog
    },
    {
        path: '/contact-us',
        component: Contact_Us
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
