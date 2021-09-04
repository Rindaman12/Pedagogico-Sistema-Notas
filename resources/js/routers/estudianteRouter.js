// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [


    //Inicio

    {
        path: '/estudiante/inicio',
        name: 'inicio',
        component: () => import('../components/app/Inicio.vue'),
        props: true
    },

    //Rutas Estudiante

    {
        path: "/estudiante/inscripcion",
        name: "inscripcion",
        component: () => import("../components/estudiante/Inscripcion.vue"),
        props: true,
    },


    {
        path: "/estudiante/constancia/inscripcion",
        name: "constancia_inscripcion",
        component: () => import("../components/app/ConstanciaInscripcion.vue"),
        props: true,
    },


    {
        path: "/estudiante/constancia/estudio",
        name: "constancia_estudio",
        component: () => import("../components/estudiante/ConstanciaEstudio.vue"),
        props: true,
    },


    {
        path: "/estudiante/record",
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