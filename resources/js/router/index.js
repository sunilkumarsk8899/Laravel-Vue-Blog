import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';
import AboutUs from '../components/About_Us.vue';
import NotFound from '../NotFound.vue';
import Blog from '../components/Blog.vue';
import Contact_Us from '../components/Contact_Us.vue';
import Single from '../components/Single.vue';
import Register from '../components/Register.vue';
import Login from '../components/Login.vue';
import adminDashboard from '../components/admin/Dashboard.vue';
import userDashboard from '../components/user/Dashboard.vue';
// import adminDashboard from '../components/admin/Dashboard.vue';


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
    },
    {
        path: '/single',
        component: Single
    },
    {
        path: '/register',
        component: Register
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/admin/dashboard',
        component: adminDashboard
    },
    {
        path: '/user/dashboard',
        component: userDashboard
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
