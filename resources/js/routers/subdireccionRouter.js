// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [
    //Inicio

    {
        path: "/subdireccion/inicio",
        name: "inicio",
        component: () => import("../components/app/Inicio.vue"),
        props: true,
    },

    //Rutas Subdireccion

    {
        path: "/subdireccion/listados",
        name: "listados",
        component: () => import("../components/app/Listados.vue"),
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
