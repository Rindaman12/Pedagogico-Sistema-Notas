<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card text-white">
                <q-form @submit="onSubmit" @reset="onReset" class="q-gutter-md">
                    <q-card-section class="header">
                        <div class="text-h6" color="white">
                            Recuperar Contraseña
                        </div>
                    </q-card-section>

                    <q-card-section class="q-pt-none">
                        <q-input
                            filled
                            v-model="email"
                            label="Email"
                            hint="Coloca tu Email de recuperacion"
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

        const email = ref(null);

        return {
            email,
            onSubmit() {
                $q.notify({
                    color: "green-4",
                    textColor: "white",
                    icon: "cloud_done",
                    message: "Enviando Correo...",
                });
            },
            onReset() {
                email.value = null;
            },
        };
    },
};
</script>

<style scoped>
.my-card {
    margin-top: 8%;
}
</style>
