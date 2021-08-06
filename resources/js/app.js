import './bootstrap';

window.Vue = require('vue').default;

Vue.component('persona-component', require('./components/PersonaComponent.vue').default);
Vue.component('personas-component', require('./components/PersonasComponent.vue').default);
Vue.component('contactos-component', require('./components/ContactosComponent.vue').default);

const app = new Vue({
    el: '#app',
});
