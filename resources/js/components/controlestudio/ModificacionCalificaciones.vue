<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card text-white">
                <q-card-section class="header">
                    <div class="text-h6" color="white">
                        Modificacion de Calificaciones
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
