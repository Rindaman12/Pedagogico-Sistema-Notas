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
                        <div class="text-h6" color="white">Constancia de estudio</div>
                    </q-card-section>
                </q-form>
            </q-card>
        </div>
    </div>
</template>

<script>
export default {
    beforeMount() {
        this.getUser();
    },

    methods: {
        getUser: function () {
            var url = "/find/user";
            axios
                .get(url)

                .catch(function (error) {
                    if (error.response && error.response.status === 401) {
                        location.reload();
                    }
                });
        },
    },
};
</script>
