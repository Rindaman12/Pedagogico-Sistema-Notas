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
                    <input type="hidden" name="token" :value="token" />

                    <q-card-section class="header">
                        <div class="text-h6" color="white">
                            Reiniciar Contraseña
                        </div>
                    </q-card-section>

                    <q-card-section>
                        <q-input
                            filled
                            type="email"
                            name="email"
                            label="Email"
                            hint="Coloca Tu Email"
                            lazy-rules
                            v-model="email"
                            bottom-slots
                            id="email"
                            required
                            autocomplete="email"
                            @click="valid"
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
                            id="password"
                            :class="[
                                'form-control',
                                passwordError ? 'is-invalid' : '',
                            ]"
                            required
                            autocomplete="new-password"
                            @click="valid"
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
                            v-model="password_confirmation"
                            name="password_confirmation"
                            label="Confirmar Contraseña"
                            hint="Confirma Tu Contraseña Por Favor"
                            lazy-rules
                            bottom-slots
                            id="password-confirm"
                            type="password"
                            :class="[
                                'form-control',
                                passwordError ? 'is-invalid' : '',
                            ]"
                            required
                            autocomplete="new-password"
                            @click="valid"
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
import Csfr from "../../Csrf";
import Swal from "sweetalert2";
import { ref } from "vue";

export default {
    components: {
        inputCsfr: Csfr,
    },
    setup() {
        const email = ref(null);
        const password = ref(null);
        const password_confirmation = ref(null);

        return {
            email,
            password,
            password_confirmation,

            onReset() {
                email.value = null;
                password.value = null;
                password_confirmation.value = null;
            },
        };
    },
    data() {
        return {
            route: location.pathname,
            message: "",
            showMessage: false,
            error: false,
            passwordError: false,
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
        async resetPass(e) {
            let data = Object.fromEntries(new FormData(e.target));
            if (
                data.password == data.password_confirmation &&
                data.password.length >= 0
            ) {
                axios
                    .post(`/password/reset`, data)
                    .then((res) => {
                        Swal.fire({
                            icon: "success",
                            title: res.data.message,
                            confirmButtonText: "Ok",
                        }).then((res) => {
                            location.pathname = `/home`;
                        });
                    })
                    .catch((err) => {
                        this.showAlert(
                            "error",
                            "Error",
                            "No se pudo cambiar la contraseña, hubo un error inesperado."
                        );
                    });
            } else {
                this.passwordError = true;
                this.showAlert(
                    "error",
                    "Error",
                    "Las Contraseñas No Coinciden."
                );
            }
        },
        valid() {
            this.passwordError = false;
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
.welcome-image {
height: 130vh;
}
</style>