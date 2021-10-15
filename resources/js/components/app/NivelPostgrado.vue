<template>
    <div class="q-pa-md row items-start q-gutter-md">
        <q-card class="my-card text-white">
            <q-card-section class="header">
                <div class="text-h6" color="white">Nivel Postgrados</div>
            </q-card-section>
            <div class="createButton">
                <q-btn
                    label="Crear Nivel Postgrado"
                    color="primary"
                    @click="crear = true"
                />
            </div>
            <div class="q-pa-md">
                <q-markup-table :separator="separator" flat bordered>
                    <thead>
                        <q-tr>
                            <th>Modificar</th>
                            <th>ID</th>
                            <th>Nombre</th>
                        </q-tr>
                    </thead>
                    <tbody>
                        <q-tr
                            v-for="nivel_postgrado in nivel_postgrados"
                            :key="nivel_postgrado.id"
                        >
                            <td class="text-center">
                                <div class="items">
                                    <button
                                        class="delete_int"
                                        type="button"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Eliminar Nivel Postgrado De La DB"
                                        v-on:click.prevent="
                                            deletenivelPostgrado(
                                                nivel_postgrado
                                            )
                                        "
                                    >
                                        <i
                                            class="fas fa-trash-alt nav-icon"
                                        ></i>
                                    </button>
                                    <button
                                        class="edit_int"
                                        type="button"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Editar Nivel Postgrado"
                                        @click="editar = true"
                                        v-on:click.prevent="
                                            findnivelPostgrado(nivel_postgrado)
                                        "
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="text-center">
                                <q-badge color="green">
                                    {{ nivel_postgrado.id }}
                                </q-badge>
                            </td>
                            <td class="text-center">
                                <q-badge color="purple">
                                    {{ nivel_postgrado.nombre }}
                                </q-badge>
                            </td>
                        </q-tr>
                    </tbody>
                </q-markup-table>

                <q-dialog
                    persistent
                    transition-show="slide-up"
                    transition-hide="slide-down"
                    v-model="crear"
                >
                    <q-card>
                        <q-bar>
                            <q-space />

                            <q-btn dense flat icon="close" v-close-popup>
                                <q-tooltip class="bg-white text-primary"
                                    >Cerrar</q-tooltip
                                >
                            </q-btn>
                        </q-bar>
                        <form
                            class="form-group"
                            @submit.prevent="crearnivelPostgrado"
                        >
                            <input-csfr />
                            <q-card-section>
                                <div class="text-h6">Nombre</div>
                                <q-input
                                    dense
                                    name="nombre"
                                    v-model="nombre"
                                    autofocus
                                    :rules="[
                                        (val) =>
                                            !!val || 'No Puede Estar vacio.',
                                    ]"
                                />
                            </q-card-section>

                            <q-card-actions align="right" class="text-primary">
                                <q-btn flat label="Cancelar" v-close-popup />
                                <q-btn
                                    type="submit"
                                    value="Submit"
                                    name="enviar"
                                    flat
                                    label="Crear Nivel Postgrado"
                                />
                            </q-card-actions>
                        </form>
                    </q-card>
                </q-dialog>

                <q-dialog
                    persistent
                    transition-show="slide-up"
                    transition-hide="slide-down"
                    v-model="editar"
                >
                    <q-card>
                        <q-bar>
                            <q-space />

                            <q-btn dense flat icon="close" v-close-popup>
                                <q-tooltip class="bg-white text-primary"
                                    >Cerrar</q-tooltip
                                >
                            </q-btn>
                        </q-bar>
                        <form
                            class="form-group"
                            @submit.prevent="updatenivelPostgrado"
                        >
                            <input-csfr />

                            <q-card-section>
                                <div class="text-h6">Nombre</div>
                                <q-input
                                    dense
                                    name="nombre"
                                    v-model="nivel_postgrado.nombre"
                                    autofocus
                                    :rules="[
                                        (val) =>
                                            !!val || 'No Puede Estar vacio.',
                                    ]"
                                />
                            </q-card-section>

                            <q-card-actions align="right" class="text-primary">
                                <q-btn flat label="Cancelar" v-close-popup />
                                <q-btn
                                    type="submit"
                                    value="Submit"
                                    name="enviar"
                                    flat
                                    label="Editar Nivel Postgrado"
                                />
                            </q-card-actions>
                        </form>
                    </q-card>
                </q-dialog>
            </div>
        </q-card>
    </div>
</template>

<script>
import { ref } from "vue";
import Csfr from "./Csrf";
import Swal from "sweetalert2";

export default {
    components: {
        inputCsfr: Csfr,
    },
    setup() {
        const nombre = ref(null);
        return {
            separator: ref("cell"),
            crear: ref(false),
            editar: ref(false),
            nombre,
        };
    },

    data() {
        return {
            errors: [],
            nivel_postgrados: [],
            nivel_postgrado: {},
        };
    },
    created() {
        // Simple GET request using axios
        this.getnivelPostgrado();
    },
    methods: {
        showAlert(type, title, message) {
            Swal.fire({
                icon: type,
                title: title,
                text: message,
            });
        },

        getnivelPostgrado: function () {
            axios
                .get("/nivel_postgrado/lista")
                .then((response) => {
                    setTimeout(() => {
                        this.nivel_postgrados = response.data.nivel_postgrados;
                    }, 1000);
                })

                .catch((err) => {
                    if (error.response && error.response.status === 401) {
                        location.reload();
                    }

                    console.log(err.response);
                    this.showAlert(
                        "error",
                        "No Se Pudo Cargar La Lista, Intente Nuevamente!.",
                        ...Object.values(err.response.data)[0]
                    );
                });
        },

        findnivelPostgrado: function (nivel_postgrado) {
            var url = "/nivel_postgrado/encontrar/" + nivel_postgrado.id;

            axios
                .get(url)
                .then((response) => {
                    setTimeout(() => {
                        this.nivel_postgrado = response.data;
                    }, 1000);
                })

                .catch((err) => {
                    if (error.response && error.response.status === 401) {
                        location.reload();
                    }

                    console.log(err.response);
                    this.showAlert(
                        "error",
                        "No Se Pudo Cargar El tipoIngreso, Intente Nuevamente!.",
                        ...Object.values(err.response.data)[0]
                    );
                });
        },

        deletenivelPostgrado: function (nivel_postgrado) {
            var url = "/nivel_postgrado/" + nivel_postgrado.id;
            Swal.fire({
                title: "Quieres Eliminar Este Nivel Postgrado?",
                text: "NO PODRAS REVERTIRLO!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si Eliminalo",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete(url)
                        .then((response) => {
                            this.showAlert(
                                "success",
                                "Nivel Postgrado Eliminado Exitosamente.",
                                ""
                            );

                            this.getnivelPostgrado();
                        })
                        .catch((error) => {
                            this.render = true;
                            this.showAlert(
                                "error",
                                "Ha Ocurrido Un Error.",
                                "No Se Puede Eliminar El tipoIngreso En Este Momento"
                            );
                        });
                }
            });
        },

        crearnivelPostgrado(e) {
            let data = Object.fromEntries(new FormData(e.target));
            axios
                .post("/nivel_postgrado/crear", data)
                .then((res) => {
                    this.crear = false;
                    this.nombre = null;

                    this.showAlert(
                        "success",
                        "Nivel Postgrado Creado Exitosamente.",
                        ""
                    );

                    this.getnivelPostgrado();
                })

                .catch((err) => {
                    if (error.response && error.response.status === 401) {
                        location.reload();
                    }

                    console.log(err.response);
                    this.showAlert(
                        "error",
                        "Se Produjo Un Error! Intente De Nuevo y Revise Los Datos.",
                        ...Object.values(err.response.data)[0]
                    );
                });
        },

        updatenivelPostgrado: function () {
            var url = "/nivel_postgrado/" + this.nivel_postgrado.id;
            axios
                .put(url, this.nivel_postgrado)
                .then((res) => {
                    this.editar = false;
                    this.showAlert(
                        "success",
                        "Nivel Postgrado Editado Exitosamente.",
                        ""
                    );

                    this.getnivelPostgrado();
                })

                .catch((err) => {
                    if (error.response && error.response.status === 401) {
                        location.reload();
                    }

                    console.log(err.response);
                    this.showAlert(
                        "error",
                        "Se Produjo Un Error! Intente De Nuevo y Revise Los Datos.",
                        ...Object.values(err.response.data)[0]
                    );
                });
        },

        exit() {
            this.errors = [];
        },
    },
};
</script>

<style scoped>
.items {
    gap: 0.5em;
    justify-content: center;
    padding-left: 5%;
}
.delete_int {
    color: red;
}
.edit_int {
    color: blue;
}
.createButton {
    padding-top: 2%;
    padding-left: 2%;
}

.my-card {
    width: 100%;
    max-width: 600px;
    margin: auto;
    margin-top: 4%;
    display: flex;
}
</style>
