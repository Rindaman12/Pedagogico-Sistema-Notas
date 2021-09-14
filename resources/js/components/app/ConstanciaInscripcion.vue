<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card
                v-if="user.tipo === 'estudiante'"
                class="my-card text-white"
            >
                <q-card-section class="header">
                    <div class="text-h6" color="white">
                        Constancia Inscripcion Estudiante
                    </div>
                </q-card-section>
            </q-card>
            <q-card
                v-else-if="user.tipo === 'coordinador_general'"
                class="my-card text-white"
            >
                <q-card-section class="header">
                    <div class="text-h6" color="white">
                        Constancia Inscripcion Coordinador
                    </div>
                </q-card-section>
            </q-card>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: [],
        };
    },
    beforeMount() {
        this.getUser();
    },

    methods: {
        getUser: function () {
            var url = "/find/user";
            axios
                .get(url)

                .then((response) => {
                    this.user = response.data;
                })

                .catch(function (error) {
                    if (error.response && error.response.status === 401) {
                        location.reload();
                    }
                });
        },
    },
};
</script>
