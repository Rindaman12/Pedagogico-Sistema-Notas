<template>
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card text-white">
                <q-card-section class="header">
                    <div class="text-h6" color="white">Tipo De Ingresos</div>
                </q-card-section>
                <div class="createButton">
                    <q-btn
                        label="Crear Tipo De Ingreso"
                        color="primary"
                        @click="crear = true"
                    />
                </div>
                <div class="q-pa-md">
                    <q-markup-table>
                        <thead>
                            <q-tr>
                                <th>Modificar</th>
                                <th>ID</th>
                                <th>Nombre</th>
                            </q-tr>
                        </thead>
                        <tbody>
                            <q-tr
                                v-for="tipoingreso in tipoingresos"
                                :key="tipoingreso.id"
                            >
                                <td>
                                    <div class="items">
                                        <button
                                            class="delete_int"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Eliminar Tipo De Ingreso De La DB"
                                            v-on:click.prevent="
                                                deletetipoIngreso(tipoingreso)
                                            "
                                        >
                                            <i
                                                class="
                                                    fas
                                                    fa-trash-alt
                                                    nav-icon
                                                "
                                            ></i>
                                        </button>
                                        <button
                                            class="edit_int"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Editar Tipo De Ingreso"
                                            @click="editar = true"
                                            v-on:click.prevent="
                                                findtipoIngreso(tipoingreso)
                                            "
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <q-badge color="green">
                                        {{ tipoingreso.id }}
                                    </q-badge>
                                </td>
                                <td>
                                    <q-badge color="purple">
                                        {{ tipoingreso.nombre }}
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
                                @submit.prevent="creartipoIngreso"
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
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-actions
                                    align="right"
                                    class="text-primary"
                                >
                                    <q-btn
                                        flat
                                        label="Cancelar"
                                        v-close-popup
                                    />
                                    <q-btn
                                        type="submit"
                                        value="Submit"
                                        name="enviar"
                                        flat
                                        label="Crear Tipo De Ingreso"
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
                                @submit.prevent="updatetipoIngreso"
                            >
                                <input-csfr />

                                   <q-card-section>
                                    <div class="text-h6">Nombre</div>
                                    <q-input
                                        dense
                                        name="nombre"
                                        v-model="tipoingreso.nombre"
                                        autofocus
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-actions
                                    align="right"
                                    class="text-primary"
                                >
                                    <q-btn
                                        flat
                                        label="Cancelar"
                                        v-close-popup
                                    />
                                    <q-btn
                                        type="submit"
                                        value="Submit"
                                        name="enviar"
                                        flat
                                        label="Editar Tipo De Ingreso"
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
            crear: ref(false),
            editar: ref(false),
            nombre,
        };
    },

    data() {
        return {
            errors: [],
            tipoingresos: [],
            tipoingreso: {},
        };
    },
    created() {
        // Simple GET request using axios
        this.gettipoIngresos();
    },
    methods: {
        showAlert(type, title, message) {
            Swal.fire({
                icon: type,
                title: title,
                text: message,
            });
        },

        gettipoIngresos: function () {
            axios
                .get("/tipoIngresos/lista")
                .then((response) => {
                    setTimeout(() => {
                        this.tipoingresos = response.data.tipoingresos;
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

        findtipoIngreso: function (tipoingreso) {
            var url = "/tipoIngresos/encontrar/" + tipoingreso.id;

            axios
                .get(url)
                .then((response) => {
                    setTimeout(() => {
                        this.tipoingreso = response.data;
                        this.id = response.data.id;
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

        deletetipoIngreso: function (tipoingreso) {
            var url = "/tipoIngresos/" + tipoingreso.id;
            Swal.fire({
                title: "Quieres Eliminar Este Tipo De Ingreso?",
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
                                "Tipo De Ingreso Eliminado Exitosamente.",
                                ""
                            );

                            this.gettipoIngresos();
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

        creartipoIngreso(e) {
            let data = Object.fromEntries(new FormData(e.target));
            axios
                .post("/tipoIngresos/crear", data)
                .then((res) => {
                    this.crear = false;
                    this.nombre = null;

                    this.showAlert(
                        "success",
                        "Tipo De Ingreso Creado Exitosamente.",
                        ""
                    );

                    this.gettipoIngresos();
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

        updatetipoIngreso: function () {
            var url = "/tipoIngresos/" + this.tipoingreso.id;
            axios
                .put(url, this.tipoingreso)
                .then((res) => {
                    this.editar = false;
                    this.showAlert(
                        "success",
                        "Tipo De Ingreso Editado Exitosamente.",
                        ""
                    );

                    this.gettipoIngresos();
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
</style>
