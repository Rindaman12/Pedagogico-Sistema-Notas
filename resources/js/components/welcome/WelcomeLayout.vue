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

            <q-tabs align="left">
                <q-route-tab to="/login" label="Iniciar Sesion" />
                <q-route-tab
                    to="/password/reset"
                    label="Restablecer contraseña"
                />
            </q-tabs>
        </q-header>

        <q-page-container>
            <router-view />
        </q-page-container>

        <q-footer reveal elevated class="footer">
            <small>
                <div align="center">
                    <strong>Copyright &copy; 2021 <a href="/">UPEL-IPC</a>.</strong>
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

<style scoped>
.footer {
    width: 100%;
    background: linear-gradient(to right, #3b3b3b, #1e1e1e, #1e1e1e, #3b3b3b);
    color: rgb(225, 225, 225);
    height: 40px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    justify-self: flex-end;
    margin-top: 20px;
}
</style>
