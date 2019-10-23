/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



import ClickOutside from "vue-click-outside";
import Notifications from 'vue-notification';
import VModal from 'vue-js-modal'

Vue.use(VModal)
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
Vue.component('noti-component', require('./components/NotiComponent.vue').default);
Vue.component('chat-component', require('./components/ChatComponent.vue').default);
Vue.component('message-component', require('./components/MessageComponent.vue').default);
Vue.component('map-component', require('./components/MapComponent.vue').default);
Vue.component('mapsearch-component', require('./components/MapsearchComponent.vue').default);
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
            notification: false,
            bell: false,
            count: 0,
            chat: false,
            thread: Object,
            sendto: String,
            account: String,
        };
    },

    created() {
        var userId = $('meta[name="userId"]').attr("content");
        var kira = $('meta[name="noticount"]').attr("content");
        //console.log(kira);
        this.count = parseInt(kira);
        Echo.private("App.User." + userId).notification(notification => {
            this.bell = true;
            this.count++;
        });
    },

    methods: {
        getThread(data, user, acc) {
            this.thread = data;
            this.sendto = user.name;
            this.account = acc.avatar_url;
            this.chat = true;
        },
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

    },

    directives: {
        ClickOutside
    }
});
