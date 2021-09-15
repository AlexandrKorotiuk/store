import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import CartShop from '../views/CartShop.vue'
const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/home',
        component: Home
    },
    {
        path: '/login',
        component: Login
    },

    {
        path: '/register',
        component: Register
    },
    {
        path: '/cart',
        component: CartShop
    },   
    {
        path: '/profile',
        name: 'profile',
        component: () => import('../views/Profile.vue')
    },
    {
        path: '/admin',
        name: 'admin',
        component: () => import('../views/BoardAdmin.vue')
    },
];
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;



