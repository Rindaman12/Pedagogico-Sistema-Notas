// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [
    //Inicio

    {
        path: "/secretaria/inicio",
        name: "inicio",
        component: () => import("../components/app/Inicio.vue"),
        props: true,
    },

    //Rutas Secretaria Postgrado

    {
        path: "/secretaria/carga_oferta/",
        name: "carga_oferta",
        component: () => import("../components/coordinador/CargaOferta.vue"),
        props: true,
    },

    {
        path: "/secretaria/listados",
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
