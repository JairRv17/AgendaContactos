<template>
    <div class="container">
        <table class="table" v-if="mostrar">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">persona_id</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Tipo de teléfono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <contactos-component
                    v-for="(contacto) in contactos"
                    :key="contacto.id"
                    :contacto="contacto"
                >
                </contactos-component>
            </tbody>
        </table>
        <table class="table" v-else>
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
                    @contacto="mostrarContactos(...arguments)"
                >
                </persona-component>
            </tbody>
        </table>
    </div>
</template>

<script>
    import ContactosComponent from './ContactosComponent.vue';
    import PersonaComponent from './PersonaComponent.vue';

    export default {
        data() {
            return {
                personas: [],
                contactos: [],
                mostrar: false,
                id_persona: null
            }
        },

        components: { PersonaComponent, ContactosComponent },

        mounted() {
            axios.get('/personas')
            .then( response => {
                this.personas = response.data;
            });
        },

        methods: {
            deletePersona(index) {
                this.personas.splice(index, 1);
            },
            updatePersona(index, persona) {
                this.personas[index] = persona;
            },
            mostrarContactos(id) {
                console.log(id);
                this.id_persona = id;
                this.mostrar = true;
                axios.get(`contactos/persona/${this.id_persona}`)
                .then( response => {
                this.contactos = response.data;
            });
            }
        }
    };
</script>
