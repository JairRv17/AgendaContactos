<template>
        <tr>
            <th scope="row">{{ persona.id }}</th>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="persona.primer_nombre"> </td>
            <td v-else>{{ persona.primer_nombre }}</td>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="persona.segundo_nombre"> </td>
            <td v-else>{{ persona.segundo_nombre }}</td>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="persona.primer_apellido"> </td>
            <td v-else>{{ persona.primer_apellido }}</td>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="persona.segundo_apellido"> </td>
            <td v-else>{{ persona.segundo_apellido }}</td>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="persona.fecha_nacimiento"> </td>
            <td v-else>{{ persona.fecha_nacimiento }}</td>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="persona.sexo"> </td>
            <td v-else>{{ persona.sexo }}</td>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="persona.fecha"> </td>
            <td v-else>{{ persona.fecha }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success" v-on:click="onClickUpdate()" v-if="editMode">Guardar</button>
                    <button type="button" class="btn btn-warning" v-on:click="onClickEdit()" v-else>Editar</button>
                    <button type="button" class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
                </div>
            </td>
            <td>
                <button type="button" class="btn btn-primary" v-on:click="onClickContacto()">Contactos</button>
                <contactos-component :persona="persona" v-if="mostrarContactos"> </contactos-component>

            </td>
            <!-- <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" v-on:click="onClickContacto()">
                    Contactos
                </button>
                <contactos-component :persona="persona" v-if="mostrarContactos"> </contactos-component>
            </td> -->

        </tr>
</template>

<script>
import ContactosComponent from './ContactosComponent.vue';
export default {
  components: { ContactosComponent },
    props: ['persona'],
    data() {
        return {
            editMode: false,
            mostrarContactos: false
        };
    },

    mounted() {
        console.log("Component mounted.");
    },

    methods: {
        onClickEdit() {
            this.editMode = true;
            // console.log(this.persona.id);
        },
        onClickDelete() {
            axios.delete(`/personas/${this.persona.id}`)
            .then( () => this.$emit('delete'));
        },
        onClickUpdate() {

            const params = {
                primer_nombre: this.persona.primer_nombre,
                segundo_nombre: this.persona.segundo_nombre,
                primer_apellido: this.persona.primer_apellido,
                segundo_apellido: this.persona.segundo_apellido,
                fecha_nacimiento: this.persona.fecha_nacimiento,
                sexo: this.persona.sexo,
                fecha: this.persona.fecha
            };
            console.log(params);
            axios.put(`/personas/${this.persona.id}`, params)
            .then( response => {
                this.editMode = false;
                const persona = response.data;
                this.$emit('update', persona);
            });
        },
        onClickContacto() {
            this.mostrarContactos = true;
            console.log(this.persona.id);
        }
    }
};
</script>
