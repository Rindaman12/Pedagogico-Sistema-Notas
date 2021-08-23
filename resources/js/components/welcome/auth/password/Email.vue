<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card text-white">
                <q-form @submit="onSubmit" @reset="onReset" class="q-gutter-md">
                    <q-card-section class="header">
                        <div class="text-h6" color="white">Recuperar Contraseña</div>
                    </q-card-section>

                    <q-card-section class="q-pt-none">
                        <q-input
                            filled
                            v-model="name"
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

<style scoped>
.my-card {
    width: 100%;
    max-width: 450px;
    margin: auto;
    margin-top: 8%;
    align-self: center;
    justify-self: center;
    display: flex;
    flex-direction: column;
}
</style>