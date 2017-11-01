
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./custom');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

class Errors {
    constructor() {
        this.errors = {};
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        } else {
            return 'Invalid input';
        }
    }

    record(errors) {
        this.errors = errors;
    }
}

const app = new Vue({
    el: '#app',

    data: {
        products: [],
        name: '',
        price: '',
        errors: new Errors,
    },

    mounted() {
        axios.get('/api/products')
            .then(response => this.products = response.data.data);
    },

    methods: {
        addProduct() {
            axios.post('/api/products', {
                name: this.name,
                price: this.price
            }).then(response => {
                console.log(response.data);
            }).catch(error => errors.record(error.response.data));
        }
    }
});
