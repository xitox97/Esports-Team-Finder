/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import ClickOutside from "vue-click-outside";
import Notifications from 'vue-notification';

Vue.use(ClickOutside);
Vue.use(Notifications);
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
Vue.component('tournament-component', require('./components/TournamentComponent.vue').default);
Vue.component('alert-component', require('./components/AlertComponent.vue').default);

new Vue({

    el: '#app',
    data() {
        return {
            isOpen: true,
            isFull: false,
            isSmall: true,
            opened: false,
            alert: true,
            team: false,
            notification: false
        };
    },

    methods: {
        toggle() {
            this.isOpen = !this.isOpen;
            this.isFull = true;
            this.isSmall = false;
        },

        onoff() {
            this.opened = !this.opened;
        },

        hide() {
            this.opened = false;
        },
        hides() {
            this.team = false;
        },
        hideAlert() {
            this.alert = false;
        },
        dropTeam() {
            this.team = !this.team;
        },
        hideNoti() {
            this.notification = false;
        },
        noti() {
            this.notification = !this.notification;
        },
        clear() {
            // remove all notifications
            this.$notify({
                group: 'foo',
                clean: true
            })
        },
        notify() {
            this.$notify({
                group: 'foo',
                title: '<h4>Nothing!</h4>',
                text: 'Don`t eat it!',
                type: 'warning',
                duration: -10
            })
        },
        notificate() {
            this.$notify({
                group: 'app',
                text: '<p><b>How about No?</b></p>',
                type: 'error',
                speed: 3000
            })
        },
    },

    directives: {
        ClickOutside
    }
});
