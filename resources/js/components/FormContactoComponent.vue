<template>
    <div>
        <form action="" v-on:submit.prevent="newContacto()">
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" class="form-control" v-model="telefono" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de teléfono</label>
                <select class="custom-select" v-model="tipo_telefono">
                    <option value="M">Móvil</option>
                    <option value="F">Fijo</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" v-model="email" required>
            </div>
            <button type="button" class="btn btn-success" v-on:click="newContacto()">Guardar</button>
            <button type="button" class="btn btn-secondary" v-on:click="cancelContacto()">Cancelar</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['persona_id'],
        data(){
            return{
                    telefono: '',
                    tipo_telefono: '',
                    email: ''
            }
        },

        mounted() {
            // console.log(this.persona_id);
        },
        methods: {
                newContacto(){
                    const params = {
                        persona_id: this.persona_id,
                        telefono: this.telefono,
                        tipo_telefono: this.tipo_telefono,
                        email: this.email
                    };

                    axios.post('/contactos', params)
                    .then((response) => {
                        const contacto = response.data;
                        // console.log(`Respuesta del servidor: ${persona}`);
                        this.$emit('newContact', contacto);
                    });
                },
                cancelContacto() {
                    this.$emit('cancelContact');
                }
        }
    }
</script>
