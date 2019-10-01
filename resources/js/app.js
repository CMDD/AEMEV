/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import VueRouter from "vue-router";

Vue.use(VueRouter);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("oracional-component", require("./oracional/Index.vue").default);
// Dia
Vue.component("adultos", require("./dia/Crear.vue").default);
Vue.component("jovenes", require("./dia/Jovenes.vue").default);

Vue.component("kids", require("./dia/Kids.vue").default);
//Puerta
Vue.component("puerta", require("./dia/Puerta.vue").default);
Vue.component("editar-puerta", require("./puerta/Editar.vue").default);
Vue.component("detalle-oracional", require("./oracional/Detalle.vue").default);

const routes = [
    {
        path: "/oracionales",
        component: require("./oracional/Index.vue").default
    },
    {
        path: "/detalle-oracional/:id",
        component: require("./oracional/Detalle.vue").default
    },
    {
        path: "/subir-oracional",
        component: require("../js/oracional/Subir").default
    },
    {
        path: "/Adultos/:id",
        component: require("./dia/Crear").default
    },
    {
        path: "/Jovenes/:id",
        component: require("./dia/Jovenes").default
    },
    {
        path: "/Kids/:id",
        component: require("./dia/Kids").default
    },
    {
        path: "/Puerta/:id",
        component: require("./dia/Puerta").default
    },
    {
        path: "/editar-puerta/:id",
        component: require("./puerta/Editar").default
    }
];
const router = new VueRouter({
    routes // short for `routes: routes`
});

const app = new Vue({
    el: "#app",
    router
});
