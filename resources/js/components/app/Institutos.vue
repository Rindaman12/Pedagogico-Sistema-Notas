<template>
    <div class="welcome-image">
        <div class="q-pa-md row items-start q-gutter-md">
            <q-card class="my-card text-white">
                <q-card-section class="header">
                    <div class="text-h6" color="white">Institutos</div>
                </q-card-section>
                <div class="createButton">
                    <q-btn
                        label="Crear Instituto"
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
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Fax Instituto</th>
                                <th>Email Instituto</th>
                                <th>Rif Instituto</th>
                                <th>Estado Instituto</th>
                            </q-tr>
                        </thead>
                        <tbody>
                            <q-tr
                                v-for="instituto in institutos"
                                :key="instituto.id"
                            >
                                <td>
                                    <div class="items">
                                        <button
                                            class="delete_int"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Eliminar Instituto De La DB"
                                            v-on:click.prevent="
                                                deleteInstituto(instituto)
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
                                            title="Editar Instituto"
                                            @click="editar = true"
                                            v-on:click.prevent="
                                                findInstituto(instituto)
                                            "
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <q-badge color="green">
                                        {{ instituto.id }}
                                    </q-badge>
                                </td>
                                <td>
                                    <q-badge color="purple">
                                        {{ instituto.nombre }}
                                    </q-badge>
                                </td>
                                <td>
                                    <q-badge color="primary">
                                        {{ instituto.direccion }}
                                    </q-badge>
                                </td>
                                <td>
                                    <q-badge color="teal">
                                        {{ instituto.telefono }}
                                    </q-badge>
                                </td>
                                <td>
                                    <q-badge color="accent">
                                        {{ instituto.fax_instituto }}
                                    </q-badge>
                                </td>
                                <td>
                                    <q-badge color="amber">
                                        {{ instituto.email_instituto }}
                                    </q-badge>
                                </td>
                                <td>
                                    <q-badge color="orange">
                                        {{ instituto.rif_instituto }}
                                    </q-badge>
                                </td>
                                <td>
                                    <q-badge color="red">
                                        {{ instituto.estado_instituto }}
                                    </q-badge>
                                </td>
                            </q-tr>
                        </tbody>
                    </q-markup-table>

                    <q-dialog
                        persistent
                        :maximized="maximizedToggle"
                        transition-show="slide-up"
                        transition-hide="slide-down"
                        v-model="crear"
                    >
                        <q-card>
                            <q-bar>
                                <q-space />

                                <q-btn
                                    dense
                                    flat
                                    icon="minimize"
                                    @click="maximizedToggle = false"
                                    :disable="!maximizedToggle"
                                >
                                    <q-tooltip
                                        v-if="maximizedToggle"
                                        class="bg-white text-primary"
                                        >Minimizar</q-tooltip
                                    >
                                </q-btn>
                                <q-btn
                                    dense
                                    flat
                                    icon="crop_square"
                                    @click="maximizedToggle = true"
                                    :disable="maximizedToggle"
                                >
                                    <q-tooltip
                                        v-if="!maximizedToggle"
                                        class="bg-white text-primary"
                                        >Maximizar</q-tooltip
                                    >
                                </q-btn>
                                <q-btn dense flat icon="close" v-close-popup>
                                    <q-tooltip class="bg-white text-primary"
                                        >Cerrar</q-tooltip
                                    >
                                </q-btn>
                            </q-bar>
                            <form
                                class="form-group"
                                @submit.prevent="crearInstituto"
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

                                <q-card-section>
                                    <div class="text-h6">Direccion</div>
                                    <q-input
                                        dense
                                        name="direccion"
                                        v-model="direccion"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Telefono</div>
                                    <q-input
                                        dense
                                        name="telefono"
                                        v-model="telefono"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Fax Instituto</div>
                                    <q-input
                                        dense
                                        name="fax_instituto"
                                        v-model="fax_instituto"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Email Instituto</div>
                                    <q-input
                                        dense
                                        name="email_instituto"
                                        v-model="email_instituto"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Rif Instituto</div>
                                    <q-input
                                        dense
                                        name="rif_instituto"
                                        v-model="rif_instituto"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Estado Instituto</div>
                                    <q-input
                                        dense
                                        name="estado_instituto"
                                        v-model="estado_instituto"
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
                                        label="Crear Instituto"
                                    />
                                </q-card-actions>
                            </form>
                        </q-card>
                    </q-dialog>

                    <q-dialog
                        persistent
                        :maximized="maximizedToggle"
                        transition-show="slide-up"
                        transition-hide="slide-down"
                        v-model="editar"
                    >
                        <q-card>
                            <q-bar>
                                <q-space />

                                <q-btn
                                    dense
                                    flat
                                    icon="minimize"
                                    @click="maximizedToggle = false"
                                    :disable="!maximizedToggle"
                                >
                                    <q-tooltip
                                        v-if="maximizedToggle"
                                        class="bg-white text-primary"
                                        >Minimizar</q-tooltip
                                    >
                                </q-btn>
                                <q-btn
                                    dense
                                    flat
                                    icon="crop_square"
                                    @click="maximizedToggle = true"
                                    :disable="maximizedToggle"
                                >
                                    <q-tooltip
                                        v-if="!maximizedToggle"
                                        class="bg-white text-primary"
                                        >Maximizar</q-tooltip
                                    >
                                </q-btn>
                                <q-btn dense flat icon="close" v-close-popup>
                                    <q-tooltip class="bg-white text-primary"
                                        >Cerrar</q-tooltip
                                    >
                                </q-btn>
                            </q-bar>
                            <form
                                class="form-group"
                                @submit.prevent="updateInstituto"
                            >
                                <input-csfr />

                                <q-card-section>
                                    <div class="text-h6">Nombre</div>
                                    <q-input
                                        dense
                                        name="nombre"
                                        v-model="instituto.nombre"
                                        autofocus
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Direccion</div>
                                    <q-input
                                        dense
                                        name="direccion"
                                        v-model="instituto.direccion"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Telefono</div>
                                    <q-input
                                        dense
                                        name="telefono"
                                        v-model="instituto.telefono"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Fax Instituto</div>
                                    <q-input
                                        dense
                                        name="fax_instituto"
                                        v-model="instituto.fax_instituto"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Email Instituto</div>
                                    <q-input
                                        dense
                                        name="email_instituto"
                                        v-model="instituto.email_instituto"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Rif Instituto</div>
                                    <q-input
                                        dense
                                        name="rif_instituto"
                                        v-model="instituto.rif_instituto"
                                        :rules="[
                                            (val) =>
                                                !!val ||
                                                'No Puede Estar vacio.',
                                        ]"
                                    />
                                </q-card-section>

                                <q-card-section>
                                    <div class="text-h6">Estado Instituto</div>
                                    <q-input
                                        dense
                                        name="estado_instituto"
                                        v-model="instituto.estado_instituto"
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
                                        label="Editar Instituto"
                                    />
                                </q-card-actions>
                            </form>
                        </q-card>
                    </q-dialog>
                </div>
            </q-card>
        </div>
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
        const direccion = ref(null);
        const telefono = ref(null);
        const fax_instituto = ref(null);
        const email_instituto = ref(null);
        const rif_instituto = ref(null);
        const estado_instituto = ref(null);

        return {
            crear: ref(false),
            editar: ref(false),
            maximizedToggle: ref(true),
            nombre,
            direccion,
            telefono,
            fax_instituto,
            email_instituto,
            rif_instituto,
            estado_instituto,
        };
    },

    data() {
        return {
            errors: [],
            institutos: [],
            instituto: {},
        };
    },
    created() {
        // Simple GET request using axios
        this.getInstitutos();
    },
    methods: {
        showAlert(type, title, message) {
            Swal.fire({
                icon: type,
                title: title,
                text: message,
            });
        },

        getInstitutos: function () {
            axios
                .get("/institutos/lista")
                .then((response) => {
                    setTimeout(() => {
                        this.institutos = response.data.institutos;
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

        findInstituto: function (instituto) {
            var url = "/institutos/encontrar/" + instituto.id;

            axios
                .get(url)
                .then((response) => {
                    setTimeout(() => {
                        this.instituto = response.data;
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
                        "No Se Pudo Cargar El Instituto, Intente Nuevamente!.",
                        ...Object.values(err.response.data)[0]
                    );
                });
        },

        deleteInstituto: function (instituto) {
            var url = "/institutos/" + instituto.id;
            Swal.fire({
                title: "Quieres Eliminar Este Instituto?",
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
                                "Instituto Eliminado Exitosamente.",
                                ""
                            );

                            this.getInstitutos();
                        })
                        .catch((error) => {
                            this.render = true;
                            this.showAlert(
                                "error",
                                "Ha Ocurrido Un Error.",
                                "No Se Puede Eliminar El Instituto En Este Momento"
                            );
                        });
                }
            });
        },

        crearInstituto(e) {
            let data = Object.fromEntries(new FormData(e.target));
            axios
                .post("/institutos/crear", data)
                .then((res) => {
                    this.crear = false;
                    this.nombre = null;
                    this.direccion = null;
                    this.telefono = null;
                    this.fax_instituto = null;
                    this.email_instituto = null;
                    this.rif_instituto = null;
                    this.estado_instituto = null;

                    this.showAlert(
                        "success",
                        "Instituto Creado Exitosamente.",
                        ""
                    );

                    this.getInstitutos();
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

        updateInstituto: function () {
            var url = "/institutos/" + this.instituto.id;
            axios
                .put(url, this.instituto)
                .then((res) => {
                    this.editar = false;
                    this.showAlert(
                        "success",
                        "Instituto Editado Exitosamente.",
                        ""
                    );

                    this.getInstitutos();
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
