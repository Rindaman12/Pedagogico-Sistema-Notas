// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [
    //Inicio

    {
        path: "/analista/inicio",
        name: "inicio",
        component: () => import("../components/app/Inicio.vue"),
        props: true,
    },

    //Rutas analistas

    {
        path: "/analista/CMDatosPersonales/",
        name: "CMDatosPersonales",
        component: () =>
            import("../components/controlestudio/CMDatosPersonales.vue"),
        props: true,
    },

    {
        path: "/analista/carga_acreditacion/",
        name: "carga_acreditacion",
        component: () =>
            import("../components/controlestudio/CargaAcreditacion.vue"),
        props: true,
    },

    {
        path: "/analista/CCNCI/",
        name: "CCNCI",
        component: () => import("../components/controlestudio/CCNCI.vue"),
        props: true,
    },

    {
        path: "/analista/inscripcion/",
        name: "inscripcion",
        component: () =>
            import("../components/controlestudio/InscripcionCE.vue"),
        props: true,
    },

    {
        path: "/analista/revision_expedientes/",
        name: "revision_expedientes",
        component: () =>
            import("../components/controlestudio/RevisionExpedientes.vue"),
        props: true,
    },

    {
        path: "/analista/record",
        name: "record",
        component: () => import("../components/app/Record.vue"),
        props: true,
    },

    {
        path: "/analista/listados",
        name: "listados",
        component: () => import("../components/app/Listados.vue"),
        props: true,
    },

    {
        path: "/analista/institutos",
        name: "institutos",
        component: () => import("../components/app/Institutos.vue"),
        props: true,
    },

    {
        path: "/analista/tipo_ingreso",
        name: "tipo_ingreso",
        component: () => import("../components/app/TipoIngreso.vue"),
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
