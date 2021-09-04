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
                        <div class="text-h6" color="white">Record</div>
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
                    $q.notify({
                        color: "green-4",
                        textColor: "white",
                        icon: "cloud_done",
                        message: "Logueado Exitosamente",
                    });
                })
                .catch((err) => {
                    $q.notify({
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
