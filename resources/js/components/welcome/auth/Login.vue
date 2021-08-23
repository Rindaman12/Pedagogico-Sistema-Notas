<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card text-white">
                <q-form
                    @submit.prevent="login"
                    @reset="onReset"
                    class="q-gutter-md"
                >
                    <q-card-section class="header">
                        <div class="text-h6" color="white">Iniciar Sesion</div>
                    </q-card-section>

                    <q-card-section class="q-pt-none">
                        <q-input
                            filled
                            v-model="usuario"
                            name="usuario"
                            label="Usuario"
                            hint="Coloca tu nombre de usuario"
                            lazy-rules
                            :rules="[
                                (val) =>
                                    (val && val.length > 0) ||
                                    'Por Favor Escribe Algo.',
                            ]"
                        />
                    </q-card-section>

                    <q-separator inset />

                    <q-card-section>
                        <q-input
                            filled
                            v-model="password"
                            type="password"
                            name="password"
                            label="Contraseña"
                            hint="Coloca Tu Contraseña"
                            lazy-rules
                            bottom-slots
                            :rules="[
                                (val) =>
                                    (val && val.length > 0) ||
                                    'Por Favor Escribe Algo.',
                            ]"
                        />
                    </q-card-section>

                    <q-separator inset />

                    <q-card-section>
                        <div>
                            <q-btn
                                label="Enviar"
                                type="submit"
                                color="primary"
                            />
                            <q-btn
                                label="Limpiar"
                                type="reset"
                                color="primary"
                                class="q-ml-sm"
                            />
                        </div>
                    </q-card-section>
                </q-form>
            </q-card>
        </div>
    </div>
</template>

<script>
import { useQuasar } from "quasar";
import { ref } from "vue";

export default {
    setup() {
        const usuario = ref(null);
        const password = ref(null);

        return {
            usuario,
            password,

            onReset() {
                usuario.value = null;
                password.value = null;
            },
        };
    },
    methods: {

        login(e) {
            let data = Object.fromEntries(new FormData(e.target));
            axios
                .post("/login", data)
                .then((res) => {
                    useQuasar().notify({
                        color: "green-4",
                        textColor: "white",
                        icon: "cloud_done",
                        message: "Logueado Exitosamente",
                    });
                })
                .catch((err) => {
                    useQuasar().notify({
                        color: "red-4",
                        textColor: "white",
                        icon: "cloud_done",
                        message: "Error, Revise Los Datos Por Favor.",
                    });
                });
        },
    },
};
</script>
