<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card">
                <q-card-section class="q-pt-none">
                    <q-img
                        src="https://lanacionweb.com//fotoedicion/2019/07/upell-1.jpg"
                        alt="imagen_inicio"
                    />
                </q-card-section>

                <q-separator inset />

                <q-card-section class="message">
                    Bienvenido a la nueva WebApp de la UPEL!
                </q-card-section>
            </q-card>
        </div>
    </div>
</template>

<style scoped>
.message {
    font-size: large;
    font-weight: bold;
}

.my-card {
    width: 100%;
    max-width: 450px;
    margin: auto;
    margin-top: 4%;
    align-self: center;
    justify-self: center;
    display: flex;
    flex-direction: column;
    border-radius: 15px;
    overflow: hidden;
}
</style>

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
