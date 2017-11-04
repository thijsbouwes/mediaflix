/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./custom');

window.Vue = require('vue');
window.Event = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('movie-modal', require('./components/MovieModal.vue'));
Vue.component('movie-list', require('./components/MovieList.vue'));
Vue.component('movie', require('./components/Movie.vue'));

const app = new Vue({
    el: '#app',

    mounted() {
        Event.$on('movieplay', (data) => {
            this.lastmovie = data;
            this.updateLastMovie();
        });

        // axios.get(ENDPOINTS.URL+this.number+'/'+ENDPOINTS.USER, config)
        // .then(response => {
        //     this.youtube = response.data.results[0];
        // })
    },

    methods: {
        updateLastMovie() {

            // axios.patch(ENDPOINTS.USER, config)
            // .then(response => {
            //     this.youtube = response.data.results[0];
            // })
        }
    },

    data: {
        username: "Thijs",
        lastmovie: ""
    }
});
