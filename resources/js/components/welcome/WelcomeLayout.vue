<template>
    <q-layout view="hHh lpR fFf">
        <q-header
            reveal
            elevated
            class="bg-primary text-white"
            height-hint="98"
        >
            <q-toolbar>
                <q-toolbar-title>
                    <q-avatar>
                        <img
                            src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg"
                        />
                    </q-avatar>
                    Universidad Pedagogica Experimental Libertador
                </q-toolbar-title>
            </q-toolbar>

            <q-tabs v-if="!sessionStarted" align="left">
                <q-route-tab to="/login" label="Iniciar Sesion" replace />
                <q-route-tab
                    to="/password/reset"
                    label="Restablecer contraseña"
                    replace
                />
            </q-tabs>
            <q-tabs v-else align="left">
                <q-route-tab
                    to="/password/reset"
                    label="Restablecer contraseña"
                    replace
                />
            </q-tabs>
        </q-header>

        <q-page-container>
            <router-view v-slot="{ Component }">
                <transition name="fade" mode="out-in">
                    <component :is="Component" />
                </transition>
            </router-view>
        </q-page-container>

        <q-footer reveal elevated class="footer">
            <small>
                <div align="center">
                    <strong
                        >Copyright &copy; 2021 <a href="/">UPEL-IPC</a>.</strong
                    >
                    Todos los derechos Reservados. Creado Por
                    <a
                        href="https://torre.co/en/luispena1098?utm_source=windu&utm_medium=web&utm_campaign=search-people&utm_term=kqf8fex1p"
                        >Luis Peña</a
                    >
                    y Miriam Burgos. Para la Universidad Pedagogica Experimental
                    Libertador.
                </div>
            </small>
        </q-footer>
    </q-layout>
</template>

<script>
export default {
    props: ["session"],
    data() {
        return {
            currSession: JSON.parse(this.session),
        };
    },
    computed: {
        sessionStarted() {
            let session = JSON.parse(this.session);
            return session === null ? false : true;
        },
    },
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}


.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>