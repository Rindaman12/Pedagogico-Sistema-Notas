// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [


    //Inicio

    {
        path: '/coordinador/inicio',
        name: 'inicio',
        component: () => import('../components/app/Inicio.vue'),
        props: true
    },

    //Rutas Estudiante

    {
        path: "/coordinador/constancia/incepcion",
        name: "constancia_incepcion",
        component: () => import("../components/coordinador/ConstanciaIncepcion.vue"),
        props: true,
    },


    {
        path: "/coordinador/listados",
        name: "listados",
        component: () => import("../components/coordinador/Listados.vue"),
        props: true,
    },


    {
        path: "/coordinador/record",
        name: "record",
        component: () => import("../components/coordinador/Record.vue"),
        props: true,
    },
    
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;