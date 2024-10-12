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
import adminProfile from '../components/admin/Profile.vue';
import userDashboard from '../components/user/Dashboard.vue';
import userProfile from '../components/user/Profile.vue';
import addProduct from '../components/admin/post/AddPost.vue';
import listProduct from '../components/admin/post/PostList.vue';
import addCategory from '../components/admin/post/AddCategory.vue';


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
    },
    {
        path: '/admin/profile',
        component: adminProfile
    },
    {
        path: '/user/profile',
        component: userProfile
    },
    {
        path: '/admin/post/add',
        component: addProduct
    },
    {
        path: '/admin/post/list',
        component: listProduct
    },
    {
        path: '/admin/category/add',
        component:addCategory
    },
    {
        path: '/admin/category/:id/edit',
        component: import('../components/admin/post/EditCategory.vue')
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
