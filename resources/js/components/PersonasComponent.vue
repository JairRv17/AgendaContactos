<template>
    <div class="container">
        <div v-if="contactosMostrar">
            <form-contacto-component
                v-if="formularioContactoMostrar"
                :persona_id="persona_id"
                @newContact="NuevoContacto(...arguments)"
                @cancelContact="CancelarContacto()"
            >
            </form-contacto-component>
            <div v-else>
                <button type="button" class="btn btn-secondary mb-4 px-4" v-on:click="esconderContactos()">Back</button>
                <button type="button" class="btn btn-primary mb-4 ml-4" v-on:click="mostrarFormularioContacto()">Agregar Contacto</button>
                <table class="table">
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
                            v-for="(contacto, index) in contactos"
                            :key="contacto.id"
                            :contacto="contacto"
                            @update="updateContacto(index, ...arguments)"
                            @delete="deleteContacto(index)"
                        >
                        </contactos-component>
                    </tbody>
                </table>
            </div>
        </div>
        <div v-else>
            <form-component
                v-if="formularioMostrar"
                @newPerson="nuevaPersona(...arguments)"
                @cancelPerson="cancelarPersona()"
            >
            </form-component>
            <div v-else>
                <button type="button" class="btn btn-primary mb-4" v-on:click="mostrarFormulario()">Agregar persona</button>
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
                            @contacto="mostrarContactos(...arguments)"
                        >
                        </persona-component>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import ContactosComponent from './ContactosComponent.vue';
    import PersonaComponent from './PersonaComponent.vue';
    import FormComponent from './FormComponent.vue';
    import FormContactoComponent from './FormContactoComponent.vue';

    export default {
        data() {
            return {
                personas: [],
                contactos: [],
                persona_id: null,
                contactosMostrar: false,
                formularioMostrar: false,
                formularioContactoMostrar: false
            }
        },

        components: { PersonaComponent, ContactosComponent, FormComponent, FormContactoComponent },

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
                this.contactosMostrar = true;
                this.persona_id = id;
                axios.get(`contactos/persona/${id}`)
                .then( response => {
                this.contactos = response.data;
                });
            },
            updateContacto(index, contacto) {
                this.contactos[index] = contacto;
                console.log(contacto);
            },
            deleteContacto(index) {
                this.contactos.splice(index, 1);
            },
            mostrarFormulario() {
                this.formularioMostrar = true;
            },
            nuevaPersona(persona) {
                // console.log(persona);
                this.personas.push(persona);
                this.formularioMostrar = false;
            },
            cancelarPersona() {
                this.formularioMostrar = false;
            },
            esconderContactos() {
                this.contactosMostrar = false;
            },
            mostrarFormularioContacto() {
                this.formularioContactoMostrar = true;
            },
            NuevoContacto(contacto) {
                this.contactos.push(contacto);
                this.formularioContactoMostrar = false;
            },
            CancelarContacto() {
                this.formularioContactoMostrar = false;
            }
        }
    };
</script>
