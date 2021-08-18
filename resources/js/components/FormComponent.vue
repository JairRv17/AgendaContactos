<template>
    <div>
        <form action="" v-on:submit.prevent="newPersona()">
            <div class="mb-3">
                <label class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" id="primerNombre" v-model="primer_nombre" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Segundo nombre</label>
                <input type="text" class="form-control" id="segundoNombre" v-model="segundo_nombre" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" id="primerApellido" v-model="primer_apellido" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="segundoApellido" v-model="segundo_apellido" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" v-model="fecha_nacimiento" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sexo</label>
                <select class="custom-select"  id="sexo" v-model="sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" v-model="fecha" required>
            </div>
            <button type="button" class="btn btn-success" v-on:click="newPersona()">Guardar</button>
            <button type="button" class="btn btn-secondary" v-on:click="cancelPersona()">Cancelar</button>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                    primer_nombre: '',
                    segundo_nombre: '',
                    primer_apellido: '',
                    segundo_apellido: '',
                    fecha_nacimiento: '',
                    sexo: '',
                    fecha: ''
            }
        },

        mounted() {

        },
        methods: {
                newPersona(){
                    const params = {
                        primer_nombre: this.primer_nombre,
                        segundo_nombre: this.segundo_nombre,
                        primer_apellido: this.primer_apellido,
                        segundo_apellido: this.segundo_apellido,
                        fecha_nacimiento: this.fecha_nacimiento,
                        sexo: this.sexo,
                        fecha: this.fecha
                    };

                    axios.post('/personas', params)
                    .then((response) => {
                        const persona = response.data;
                        // console.log(`Respuesta del servidor: ${persona}`);
                        this.$emit('newPerson', persona);
                    });
                },
                cancelPersona() {
                    this.$emit('cancelPerson');
                }
        }
    }
</script>
