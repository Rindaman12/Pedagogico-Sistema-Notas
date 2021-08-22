// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [
    {
        path: '/',
        name: 'welcome',
        component: () => import('../components/welcome/WelcomeView.vue'),
        props: true
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../components/welcome/auth/Login.vue'),
        props: true
    },
  
    {
        path: '/password/reset',
        name: 'email',
        component: () => import('../components/welcome/auth/password/Email.vue'),
        props: true
    }, 
    {
        path: '/password/reset/:token',
        name: 'reset',
        component: () => import('../components/welcome/auth/password/Reset.vue'),
        props: true
    }, 
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;