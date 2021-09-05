<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card v-if="user.tipo === 'coordinador'" class="my-card text-white">
                <q-card-section class="header">
                    <div class="text-h6" color="white">Listados Coordinador</div>
                </q-card-section>
            </q-card>
            <q-card
                v-else-if="user.tipo === 'coordinador_general'"
                class="my-card text-white"
            >
                <q-card-section class="header">
                    <div class="text-h6" color="white">Listados Coordinador General</div>
                </q-card-section>
            </q-card>
            <q-card
                v-else-if="user.tipo === 'secretaria'"
                class="my-card text-white"
            >
                <q-card-section class="header">
                    <div class="text-h6" color="white">Listados Secretaria</div>
                </q-card-section>
            </q-card>
        </div>
    </div>
</template>

<script>
import { useQuasar } from "quasar";
import { ref } from "vue";

export default {
    data() {
        return {
            user: [],
        };
    },
    created() {
        this.getUser();
    },
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
        getUser: function () {
            var url = "/find/user";
            axios.get(url).then((response) => {
                this.user = response.data;
            });
        },
    },
};
</script>
