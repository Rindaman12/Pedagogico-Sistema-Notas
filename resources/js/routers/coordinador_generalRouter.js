// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [


    //Inicio

    {
        path: '/coordinador_general/inicio',
        name: 'inicio',
        component: () => import('../components/app/Inicio.vue'),
        props: true
    },

    //Rutas Coordinador General

    {
        path: "/coordinador_general/constancia/inscripcion",
        name: "constancia_inscripcion",
        component: () => import("../components/app/ConstanciaInscripcion.vue"),
        props: true,
    },

    {
        path: "/coordinador_general/listados",
        name: "listados",
        component: () => import("../components/app/Listados.vue"),
        props: true,
    },

    {
        path: "/coordinador_general/record",
        name: "record",
        component: () => import("../components/app/Record.vue"),
        props: true,
    },
    
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;