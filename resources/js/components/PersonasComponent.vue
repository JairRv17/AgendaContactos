<template>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Primer Nombre</th>
                    <th scope="col">Segundo Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones </th>
                    <th scope="col">Contacto</th>
                </tr>
            </thead>
            <tbody>
                <persona-component
                    v-for="(persona, index) in personas"
                    :key="persona.id"
                    :persona="persona"
                    @update="updatePersona(index, ...arguments)"
                    @delete="deletePersona(index)"
                >
                </persona-component>
            </tbody>
        </table>
    </div>
</template>

<script>
    import PersonaComponent from './PersonaComponent.vue';

    export default {
        data() {
            return {
                personas: []
            }
        },

        components: { PersonaComponent },

        mounted() {
            axios.get('/personas')
            .then( response => {
                this.personas = response.data;
            });
            // console.log("Component mounted.");
        },

        methods: {
            deletePersona(index) {
                this.personas.splice(index, 1);
            },
            updatePersona(index, persona) {
                this.personas[index] = persona;
            }
        }
    };
</script>
