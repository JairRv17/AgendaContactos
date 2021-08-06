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
                    <button type="button" class="btn btn-secondary" v-on:click="onClickCancel()" v-if="editMode">Cancelar</button>
                    <button type="button" class="btn btn-danger" v-on:click="onClickDelete()"  v-else>Eliminar</button>
                </div>
            </td>
        </tr>
</template>

<script>
export default {
    props: ['contacto'],

    data() {
        return {
            editMode: false
        };
    },

    mounted() {
        console.log("Component mounted.");
    },

    methods: {
        onClickEdit() {
            this.editMode = true;
            // console.log(this.contacto.id);
        },
        onClickCancel() {
            this.editMode = false;
        },
        onClickDelete() {
            axios.delete(`/contactos/${this.contacto.id}`)
            .then( () => this.$emit('delete'));
        },
        onClickUpdate() {

            const params = {
                telefono: this.contacto.telefono,
                tipo_telefono: this.contacto.tipo_telefono,
                email: this.contacto.email
            };
            // console.log(params);
            axios.put(`/contactos/${this.contacto.id}`, params)
            .then( response => {
                this.editMode = false;
                const contacto = response.data;
                console.log(contacto);
                this.$emit('update', contacto);
            });
        }
    }
};
</script>
