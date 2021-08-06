<template>
        <tr>
            <th scope="row">{{ contacto.id }}</th>
            <td>{{ contacto.persona_id }}</td>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="contacto.telefono"> </td>
            <td v-else>{{ contacto.telefono }}</td>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="contacto.tipo_telefono"> </td>
            <td v-else>{{ contacto.tipo_telefono }}</td>
            <td v-if="editMode"> <input type="text" class="form-control" v-model="contacto.email"> </td>
            <td v-else>{{ contacto.email }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success" v-on:click="onClickUpdate()" v-if="editMode">Guardar</button>
                    <button type="button" class="btn btn-warning" v-on:click="onClickEdit()" v-else>Editar</button>
                    <button type="button" class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
                </div>
            </td>
            <!-- <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" v-on:click="onClickContacto()">
                    Contactos
                </button>
                <contactos-component :contacto="contacto" v-if="mostrarContactos"> </contactos-component>
            </td> -->

        </tr>
</template>

<script>
export default {
    props: ['contacto'],

    data() {
        return {
            editMode: false,
        };
    },

    mounted() {
        console.log("Component mounted.");
        axios.get('/contactos')
        .then( response => {
            this.personas = response.data;
        });
    },

    methods: {
        onClickEdit() {
            this.editMode = true;
            // console.log(this.contacto.id);
        },
        onClickDelete() {
            axios.delete(`/contactos/${this.contacto.id}`)
            .then( () => this.$emit('delete'));
        },
        onClickUpdate() {

            const params = {
                primer_nombre: this.contacto.primer_nombre,
                segundo_nombre: this.contacto.segundo_nombre,
                primer_apellido: this.contacto.primer_apellido,
                segundo_apellido: this.contacto.segundo_apellido,
                fecha_nacimiento: this.contacto.fecha_nacimiento,
                sexo: this.contacto.sexo,
                fecha: this.contacto.fecha
            };
            console.log(params);
            axios.put(`/contactos/${this.contacto.id}`, params)
            .then( response => {
                this.editMode = false;
                const contacto = response.data;
                this.$emit('update', contacto);
            });
        },
        onClickContacto() {
            this.mostrarContactos = true;
            this.$emit('contacto', contacto);
            console.log(this.contacto.id);
        }
    }
};
</script>
