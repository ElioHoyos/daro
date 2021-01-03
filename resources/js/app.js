
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';
import Vue from 'vue';
import swal from 'sweetalert2';
import VeeValidate, { Validator } from 'vee-validate';
import VueProgressBar from 'vue-progressbar';
import VueRouter from 'vue-router';
import { ServerTable, ClientTable, Event } from 'vue-tables-2';
import * as VueGoogleMaps from 'vue2-google-maps';
import vSelect from 'vue-select';

// Window require
window.swal = swal;

// Vue use
Vue.use(VueRouter);
// Vue.use(VeeValidate);
Vue.use(VeeValidate, {
    classes: true
});
Vue.use(ClientTable);
Vue.use(VueProgressBar, {
    // color: 'white',
    color: 'rgb(143, 255,199)',
    failedColor: 'red',
    thickness: '6px',
});

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBoC50c195wjGs2gxBzz5jInz2yFtizUG4',
        libraries: 'places', // This is required if you use the Autocomplete plugin
        // OR: libraries: 'places,drawing'
        // OR: libraries: 'places,drawing,visualization'
        // (as you require)

        //// If you want to set the version, you can do so:
        // v: '3.26',
    },

    //// If you intend to programmatically custom event listener code
    //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
    //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
    //// you might need to turn this on.
    // autobindAllEvents: false,

    //// If you want to manually install components, e.g.
    //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
    //// Vue.component('GmapMarker', GmapMarker)
    //// then disable the following:
    // installComponents: true,
})

// Validation messages
const messages = {
    alpha_spaces: (field) => `El campo ${field} solo debe contener letras y espacios.`,
    between: (field, [min, max]) => `Este campo debe estar entre ${min} y ${max}.`,
    email: (field) => `El campo ${field} debe ser un correo electrónico válido.`,
    date_format: (field, [format]) => format == 'YYYY' ? `Este campo debe tener formato de año` : `Este campo debe tener formato ${format}.`,
    max: (field, [length]) => `El campo de ${field} no debe ser mayor a ${length} caracteres.`,
    min: (field, [length]) => `El campo de ${field} debe tener al menos ${length} caracteres.`,
    numeric: (field) => `Este campo debe contener solo caracteres numéricos.`,
    required: (field) => `El campo ${field} es obligatorio.`,
    url: (field) => `Este campo no es una URL válida.`
};

const locale = {
    name: 'en',
    messages
};

Validator.localize({ [locale.name]: locale });

// Define some routes

const routes = [
    // Main Routes
    { path: '/', component: require('./components/perfil.vue') },
    { path: '/home', component: require('./components/perfil.vue')},
    // { path: '*', component: require('./components/perfil.vue') },
    //rutas admin
    { path: '/mision-vision', component: require('./components/admin/mision-vision.vue') },
    { path: '/vercatalogos', component: require('./components/admin/catalogos.vue') },
    { path: '/vercategorias', component: require('./components/admin/categorias.vue') },
    { path: '/configuracion_productos', component: require('./components/admin/productos.vue') },
    { path: '/costos', component: require('./components/admin/costos.vue') },
    { path: '/ingresos', component: require('./components/admin/ingresos.vue') },
    { path: '/usuarios', component: require('./components/admin/usuarios.vue') },
    { path: '/personals', component: require('./components/admin/personal.vue') },
 

    // { path: '/alumnos', component: require('./components/admin/alumnos.vue') },    
];

// Create the route instance
const router = new VueRouter({
    mode: 'history',
    routes
});

// Vue filters
Vue.filter('formatDate', function (data) {
    return moment(data).format("DD/MM/YYYY");
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('moon-loader', require('vue-spinner/src/MoonLoader.vue'));
Vue.component('error', require('./components/templates/error.vue'));
Vue.component('perfil1', require('./components/templates/perfil1.vue'));
Vue.component('perfil2', require('./components/templates/perfil2.vue'));
Vue.component('perfil3', require('./components/templates/perfil3.vue'));
Vue.component('mision', require('./components/templates/mision.vue'));
Vue.component('categoria', require('./components/templates/categoria.vue'));
Vue.component('producto', require('./components/templates/producto.vue'));
Vue.component('usuario', require('./components/templates/usuario.vue'));
Vue.component('personalT', require('./components/templates/personalT.vue'));
Vue.component('catalogo', require('./components/templates/catalogo.vue'));
Vue.component('cobrov2', require('./components/templates/cobrov2.vue'));
Vue.component('v-select', vSelect);



// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router
}).$mount('#app');