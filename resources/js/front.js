/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap'); //portati bootstrap

window.axios = require('axios');    //altro modo per importare axios non sara' necesario stanziarlo pke in automatico lo eredita

window.Vue = require('vue');


//creaiamo il collegamento tra App.vue e il file front.js
import App from "./components/App.vue";

const app = new Vue({
    el: '#root',
    render: h => h(App)     //tramite el prende l elemento root // render serve a reinderizza e' la funzione prende un paramentro crea un evento e gli stai dicendo che la tua Home e' APP
})