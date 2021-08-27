<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card text-white">
                <q-form
                    @submit.prevent="resetPass"
                    @reset="onReset"
                    class="q-gutter-md"
                >
                    <input-csfr />

                    <q-card-section class="header">
                        <div class="text-h6" color="white">
                            Recuperar Contraseña
                        </div>
                    </q-card-section>

                    <q-card-section class="q-pt-none">
                        <q-input
                            filled
                            name="email"
                            lazy-rules
                            v-model="email"
                            label="Email"
                            hint="Coloca tu Email de recuperacion"
                            :rules="[
                                (val) =>
                                    (val && val.length > 0) ||
                                    'Por Favor Escribe Algo.',
                            ]"
                        />
                    </q-card-section>

                    <q-separator inset />

                    <q-card-section>
                        <recaptcha
                            v-if="showRecaptcha"
                            class="justify-content-center"
                            siteKey="6LcVBCYcAAAAANyRP9722ZYtHWyRnNLUOk8iWFAc"
                            size="normal"
                            theme="light"
                            :tabindex="0"
                            @verify="recaptchaVerified"
                            @expire="recaptchaExpired"
                            @fail="recaptchaFailed"
                            ref="recaptcha"
                        />
                    </q-card-section>

                    <q-separator inset />

                    <q-card-section>
                        <div>
                            <q-btn
                                label="Enviar"
                                type="submit"
                                color="primary"
                                name="enviar"
                                :disabled="disable"
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
import Csfr from "../Csrf";
import Swal from "sweetalert2";

import { ref } from "vue";

export default {
    components: {
        inputCsfr: Csfr,
    },
  
    setup() {
        const email = ref(null);

        return {
            email,

            onReset() {
                email.value = null;
            },
        };
    },

    data() {
        return {
            message: "",
            showMessage: false,
            errorEmail: false,
            timer: null,
            isMailSended: false,
            showRecaptcha: true,
            disable: true,
        };
    },
    methods: {
        showAlert(type, title, message) {
            Swal.fire({
                icon: type,
                title: title,
                text: message,
                confirmButtonText: "Ok",
            });
        },
        resetPass(e) {
            this.loading = true;
            let data = Object.fromEntries(new FormData(e.target));
            this.valid();
            axios
                .post("/password/email", data)
                .then((res) => {
                    this.showAlert("success", "Email Enviado", "");
                })
                .catch((err) => {
                    this.showAlert(
                        "error",
                        "Error",
                        "Revise Los Datos Por Favor."
                    );
                });
        },
        valid() {
            this.showMessage = false;
            this.errorEmail = false;
            clearInterval(this.timer);
        },

        // Recaptcha methods
        recaptchaVerified(res) {
            this.disable = false;
        },
        recaptchaExpired() {
            this.$refs.recaptcha.reset();
            this.disable = true;
        },
        recaptchaFailed() {},
    },
};
</script>

<style scoped>
.my-card {
    margin-top: 5%;
}
</style>
