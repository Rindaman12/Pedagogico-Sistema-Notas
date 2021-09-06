// Router
import { createWebHistory, createRouter } from "vue-router";

//Se crean las rutas para ser usadas con los componentes que seran llamados

const routes = [
    //Inicio

    {
        path: "/curriculo/inicio",
        name: "inicio",
        component: () => import("../components/app/Inicio.vue"),
        props: true,
    },

    //Rutas curriculo

    {
        path: "/curriculo/CMcursos",
        name: "CMcursos",
        component: () =>
            import("../components/curriculo/CMCursos.vue"),
        props: true,
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
