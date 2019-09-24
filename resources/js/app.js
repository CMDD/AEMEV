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
Vue.component("crear-dia", require("./dia/Crear.vue").default);
Vue.component("crear-dia-jovenes", require("./dia/Jovenes.vue").default);

Vue.component("crear-dia-kids", require("./dia/Kids.vue").default);
Vue.component("crear-dia-puerta", require("./dia/Puerta.vue").default);

const routes = [
    {
        path: "/oracionales",
        component: require("./oracional/Index.vue").default
    },
    {
        path: "/subir-oracional",
        component: require("../js/oracional/Subir").default
    },
    {
        path: "/crear-dia",
        component: require("./dia/Crear").default
    },
    {
        path: "/crear-dia-jovenes",
        component: require("./dia/Jovenes").default
    },
    {
        path: "/crear-dia-kids",
        component: require("./dia/Kids").default
    },
    {
        path: "/crear-dia-puerta",
        component: require("./dia/Puerta").default
    }
];
const router = new VueRouter({
    routes // short for `routes: routes`
});

const app = new Vue({
    el: "#app",
    router
});
