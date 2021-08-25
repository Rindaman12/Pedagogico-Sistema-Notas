<template>
    <q-layout view="hHh lpR fFf">
        <q-header elevated class="bg-primary text-white" height-hint="98">
            <q-toolbar>
                <q-toolbar-title>
                    <q-avatar>
                        <img
                            src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg"
                        />
                    </q-avatar>
                    Universidad Pedagogica Experimental Libertador
                </q-toolbar-title>

                <q-btn
                    dense
                    flat
                    round
                    icon="menu"
                    @click="toggleRightDrawer"
                />
            </q-toolbar>

            <q-tabs align="left">
                <q-route-tab to="/page1" label="Inicio" />
            </q-tabs>
        </q-header>

        <q-drawer show-if-above v-model="rightDrawerOpen" side="left" bordered>
            <q-scroll-area
                style="
                    height: calc(100% - 150px);
                    margin-top: 150px;
                    border-right: 1px solid #ddd;
                "
            >
                <q-list padding>
                    <q-item clickable v-ripple>
                        <q-item-section avatar>
                            <q-icon name="home" />
                        </q-item-section>

                        <q-item-section> Inicio </q-item-section>
                    </q-item>

                    <q-item active clickable v-ripple>
                        <q-item-section avatar>
                            <q-icon
                                @click.prevent="logout"
                                href="/logout"
                                name="logout"
                                color="black"
                            />
                        </q-item-section>

                        <q-item-section>
                            <a
                                class="link"
                                @click.prevent="logout"
                                href="/logout"
                                >Cerrar Sesion</a
                            >
                            <form
                                id="logout-form"
                                :action="'/logout'"
                                method="POST"
                            >
                                <input-csfr />
                            </form>
                        </q-item-section>
                    </q-item>
                </q-list>
            </q-scroll-area>

            <q-img
                class="absolute-top"
                src="https://cdn.quasar.dev/img/material.png"
                style="height: 150px"
            >
                <div class="absolute-bottom bg-transparent">
                    <q-avatar size="56px" class="q-mb-sm">
                        <img src="https://cdn.quasar.dev/img/boy-avatar.png" />
                    </q-avatar>
                    <div class="text-weight-bold">Nombre apellido</div>
                    <div>@usuario</div>
                </div>
            </q-img>
        </q-drawer>

        <q-page-container>
            <router-view />
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
import Csfr from "./Csrf";
import { ref } from "vue";

export default {
    components: {
        inputCsfr: Csfr,
    },
    setup() {
        const rightDrawerOpen = ref(false);

        return {
            rightDrawerOpen,
            toggleRightDrawer() {
                rightDrawerOpen.value = !rightDrawerOpen.value;
            },
        };
    },
    methods: {
        logout() {
            document.getElementById("logout-form").submit();
            localStorage.tabs = "[]";
        },
    },
};
</script>

<style>
.link {
    text-decoration: none;
    color: black;
}
</style>
