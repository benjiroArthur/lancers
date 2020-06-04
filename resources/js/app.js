/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Slick from 'vue-slick';
import Vuetify from 'vuetify';
Vue.use(Vuetify);

import TextareaAutosize from 'vue-textarea-autosize';

Vue.use(TextareaAutosize);

import {RotateSquare2} from 'vue-loading-spinner';

window.RotateSquare2 = RotateSquare2;

import Vuelidate from "vuelidate";
Vue.use(Vuelidate);

Vue.use(VueRouter);

import VueCarousel from 'vue-carousel';

Vue.use(VueCarousel);
import VueSlickCarousel from 'vue-slick-carousel';


require('@fortawesome/fontawesome-free/js/all.js');
require('bootstrap-table/dist/bootstrap-table.min.css');
require('bootstrap-table/dist/bootstrap-table.js');

require('tableexport.jquery.plugin');
require('bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js');
require('bootstrap-table/dist/extensions/print/bootstrap-table-print.min.js');

require('bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.css');
require('bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.js');



import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, {
    load: {
        key: 'YOUR_API_TOKEN',
        libraries: 'places', // This is required if you use the Autocomplete plugin
        // OR: libraries: 'places,drawing'
        // OR: libraries: 'places,drawing,visualization'
        // (as you require)

        //// If you want to set the version, you can do so:
        // v: '3.26',
    },});


//import {Form, HasError, AlertError} from 'vform';
import {
    Form,
    HasError,
    AlertError,
    AlertErrors,
    AlertSuccess
} from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertErrors.name, AlertErrors);
Vue.component(AlertSuccess.name, AlertSuccess);

import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
});


// Import this component
import datePicker from 'vue-bootstrap-datetimepicker';
/*import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';*/
window.datePicker = datePicker;

jQuery.extend(true, jQuery.fn.datetimepicker.defaults,{
    icons:{
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar',
        clear: 'far fa-trash-alt',
        close: 'far fa-times-circle',

    }
});

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
Vue.component('pagination', require('laravel-vue-pagination'));

import Swal from 'sweetalert2';
window.Swal = Swal;


const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});
window.toast = Toast;

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

import moment from 'moment';
Vue.filter('uptext', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});
Vue.filter('myDate', function(text){
    return moment(text).format('MMMM Do YYYY');
});

Vue.filter('fromdate', function(text){
    return moment(text).fromNow();
});

Vue.filter('trimtext', function(value){
    let len = 20;
    let val = value.slice(0, len);
    return value.length < len ? value : val + '...';
});




import VueLazyload from 'vue-lazyload';

Vue.use(VueLazyload);

import VueCropper from 'vue-cropperjs';
import 'cropperjs/dist/cropper.css';
Vue.component(VueCropper);





/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('welcome', require('./components/Welcome.vue').default);
Vue.component('contact-us', require('./components/ContactUs.vue').default);
Vue.component('update', require('./components/Resources/Notification.vue').default);
Vue.component('browse', require('./components/Resources/Browse.vue').default);
Vue.component('messages', require('./components/Resources/Messages.vue').default);
Vue.component('my-project', require('./components/Resources/MyProject.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('register', require('./components/Register.vue').default);
Vue.component('home', require('./components/Home.vue').default);
Vue.component('admin-home', require('./components/Home/AdminHome.vue').default);
Vue.component('freelancer-home', require('./components/Home/FreelancerHome.vue').default);
Vue.component('client-home', require('./components/Home/ClientHome.vue').default);
Vue.component('freelancer-profile', require('./components/Freelancer/Dashboard/FreelancerProfile.vue').default);
Vue.component('client-profile', require('./components/ProjectManager/Dashboard/ClientProfile.vue').default);
Vue.component('admin-profile', require('./components/Admin/Dashboard.vue').default);
Vue.component('chat', require('./components/Chat/Chat.vue').default);
Vue.component('chat-header', require('./components/Chat/ChatHeader.vue').default);
Vue.component('contact-list', require('./components/Chat/ContactList.vue').default);
Vue.component('conversation', require('./components/Chat/Conversation.vue').default);
Vue.component('messages-composer', require('./components/Chat/MessagesComposer').default);
Vue.component('messages-feed', require('./components/Chat/MessagesFeed.vue').default);
Vue.component('browse-jobs', require('./components/Jobs/BrowseJobs.vue').default);
Vue.component('all-projects', require('./components/Jobs/AllProjects.vue').default);
Vue.component('digital-projects', require('./components/Jobs/DigitalProjects.vue').default);
Vue.component('programming-projects', require('./components/Jobs/ProgrammingProjects.vue').default);
Vue.component('video-project', require('./components/Jobs/VideoProjects.vue').default);
Vue.component('graphics-projects', require('./components/Jobs/GraphicsProjects.vue').default);



Vue.component('VueSlickCarousel', VueSlickCarousel);
Vue.component('slick', Slick);



let routes = [
    //{path:'/home', component: require('./components/Home.vue').default},
    //freelancer routes
    /*{path:'/freelancer/dashboard/all-project', component: require('./components/Freelancer/Dashboard/AllProjects.vue').default},
    {path:'/freelancer/dashboard/in-progress', component: require('./components/Freelancer/Dashboard/InProgress.vue').default},
    {path:'/freelancer/dashboard/completed', component: require('./components/Freelancer/Dashboard/Completed.vue').default},
    {path:'/freelancer/dashboard/all-jobs', component: require('./components/Freelancer/Dashboard/AllJobs.vue').default},
    {path:'/freelancer/dashboard/submit-jobs', component: require('./components/Freelancer/Dashboard/SubmitJobs.vue').default},
    {path:'/freelancer/dashboard/profile', component: require('./components/Freelancer/Dashboard/FreelancerProfile.vue').default},*/

    //project manager routes
   /* {path:'/scrum/dashboard/all-project', component: require('./components/ProjectManager/Dashboard/AllProjects.vue').default},
    {path:'/scrum/dashboard/in-progress', component: require('./components/ProjectManager/Dashboard/InProgress.vue').default},
    {path:'/scrum/dashboard/completed', component: require('./components/ProjectManager/Dashboard/Completed.vue').default},
    {path:'/scrum/dashboard/post-job', component: require('./components/ProjectManager/Dashboard/PostJobs.vue').default},
    {path:'/scrum/dashboard/payment', component: require('./components/ProjectManager/Dashboard/Payment.vue').default},
    {path:'/scrum/dashboard/profile', component: require('./components/ProjectManager/Dashboard/ClientProfile.vue').default},*/
];

const router = new VueRouter({
    mode:'history',
    routes

});

router.beforeResolve((to, from, next)=>{
    if(to.path){

    }
    next();
});

router.afterEach(()=>{

});

window.Fire = new Vue();

import VueRouter from 'vue-router';
import axios from "axios";
import { VuejsDatatableFactory } from 'vuejs-datatable';

Vue.use(VueRouter, axios, VuejsDatatableFactory);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
    data: () => ({
        pageLoader: true,
        userId: '',
        resource_path: '',
    }),
    mounted() {
        setTimeout(val => {
            this.pageLoader = false;

           /* $('#app').removeAttr('v-cloak');*/
        }, 4000);

        /*Echo.channel('newUser').listen('NewUser', function(e){
            //this.index();
            console.log(e);
        });*/
    },
    created(){
        this.userId = $('meta[name = "user-id"]').attr('content')
        this.resource_path = $('meta[name = "resource_path"]').attr('content')
    },
});
