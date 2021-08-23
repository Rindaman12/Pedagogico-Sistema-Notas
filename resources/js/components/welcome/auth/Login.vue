<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card text-white">
                <q-form @submit="onSubmit" @reset="onReset" class="q-gutter-md">
                    <q-card-section class="header">
                        <div class="text-h6" color="white">Iniciar Sesion</div>
                    </q-card-section>

                    <q-card-section class="q-pt-none">
                        <q-input
                            filled
                            v-model="user"
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
        const $q = useQuasar();

        const user = ref(null);
        const password = ref(null);

        return {
            user,
            password,
            onSubmit() {
                $q.notify({
                    color: "green-4",
                    textColor: "white",
                    icon: "cloud_done",
                    message: "Logueado Exitosamente",
                });
            },

            onReset() {
                user.value = null;
                password.value = null;
            },
        };
    },
};
</script>
