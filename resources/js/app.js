/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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
            dropOpen: false,
        };
    },

    watch: {
        dropOpen(dropOpen) {
            if (dropOpen) {
                document.addEventListener('click', this.closeIfClickedOutside);
            }
        }
    },


    methods: {
        toggle() {
            this.isOpen = !this.isOpen;
            this.isFull = true;
            this.isSmall = false;
        },

        closeIfClickedOutside(event) {

            if (!document.getElementById('dropdown').contains(event.target)) {
                console.log('masuk');
                this.dropOpen = false;

                document.removeEventListener('click', this.closeIfClickedOutside);
                console.log('keluar');
            }
        }
    }
});
