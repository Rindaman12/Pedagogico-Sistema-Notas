// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [


    //Inicio

    {
        path: '/home',
        name: 'inicio',
        component: () => import('../components/app/Inicio.vue'),
        props: true
    },

    //Rutas Estudiante

    {
        path: "/inscripcion",
        name: "inscripcion",
        component: () => import("../components/estudiante/Inscripcion.vue"),
        props: true,
    },

    //Rutas Profesor

    {
        path: "/nomina",
        name: "nomina",
        component: () => import("../components/profesor/NominaCursos.vue"),
        props: true,
    },
    
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;