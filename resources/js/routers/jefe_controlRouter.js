// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [
    //Inicio

    {
        path: "/jefe_control/inicio",
        name: "inicio",
        component: () => import("../components/app/Inicio.vue"),
        props: true,
    },

    //Rutas analistas

    {
        path: "/jefe_control/CMDatosPersonales/",
        name: "CMDatosPersonales",
        component: () =>
            import("../components/controlestudio/CMDatosPersonales.vue"),
        props: true,
    },

    {
        path: "/jefe_control/carga_acreditacion/",
        name: "carga_acreditacion",
        component: () =>
            import("../components/controlestudio/CargaAcreditacion.vue"),
        props: true,
    },

    {
        path: "/jefe_control/CCNCI/",
        name: "CCNCI",
        component: () => import("../components/controlestudio/CCNCI.vue"),
        props: true,
    },

    {
        path: "/jefe_control/inscripcion/",
        name: "inscripcion",
        component: () => import("../components/controlestudio/InscripcionCE.vue"),
        props: true,
    },

    {
        path: "/jefe_control/revision_expedientes/",
        name: "revision_expedientes",
        component: () =>
            import("../components/controlestudio/RevisionExpedientes.vue"),
        props: true,
    },

    {
        path: "/jefe_control/record",
        name: "record",
        component: () => import("../components/app/Record.vue"),
        props: true,
    },

    {
        path: "/jefe_control/listados",
        name: "listados",
        component: () => import("../components/app/Listados.vue"),
        props: true,
    },


    {
        path: "/jefe_control/modificacion_calificaciones",
        name: "modificacion_calificaciones",
        component: () => import("../components/controlestudio/ModificacionCalificaciones.vue"),
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
