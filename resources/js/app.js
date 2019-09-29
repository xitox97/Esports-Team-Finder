/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import ClickOutside from "vue-click-outside";

Vue.use(ClickOutside);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);

new Vue({

    el: '#app',
    data() {
        return {
            isOpen: true,
            isFull: false,
            isSmall: true,
            opened: false,
            alert: true
        };
    },

    methods: {
        toggle() {
            this.isOpen = !this.isOpen;
            this.isFull = true;
            this.isSmall = false;
        },

        onoff() {
            this.opened = true;
        },

        hide() {
            this.opened = false;
        },
        hideAlert() {
            this.alert = false;
        }
    },

    directives: {
        ClickOutside
    }
});
