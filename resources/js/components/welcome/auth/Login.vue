<template>
    <div class="welcome-image">

        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card text-white">
                <q-form
                    @submit.prevent="login"
                    @reset="onReset"
                    class="q-gutter-md"
                >
                    <input-csfr />

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
import Swal from "sweetalert2";
import Csfr from "./Csrf";
import { ref } from "vue";

export default {
    components: {
        inputCsfr: Csfr,
    },
    data() {
        return {
            showRecaptcha: true,
            disable: true,
        };
    },
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
        showAlert(type, title, message) {
            Swal.fire({
                icon: type,
                title: title,
                text: message,
                confirmButtonText: "Ok",
            });
        },

        login(e) {
            let data = Object.fromEntries(new FormData(e.target));
            axios
                .post("/login", data)
                .then((res) => {
                    this.showAlert(
                        "success",
                        "Inicio De Sesion",
                        "Logueado Exitosamente"
                    );
                    location.href = "/home";
                })
                .catch((err) => {
                    this.showAlert(
                        "error",
                        "Error",
                        "Revise Los Datos Por Favor."
                    );
                });
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

