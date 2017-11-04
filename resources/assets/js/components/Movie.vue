<template>
    <div class="card" @click="getTrailer">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" v-bind:src="linkImage">
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">{{ title }}<i class="material-icons right">more_vert</i></span>
            <p class="reviews">
                <i v-for="staricon in fullStar" class="material-icons">star</i>
                <i v-if="halfStar" class="material-icons">star_half</i>
            </p>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">{{ title }}<i class="material-icons right">close</i></span>
            <p v-text="description"></p>
            <a class="waves-effect waves-light btn modal-trigger center-align" @click="openTrailer" href="#trailer">
                <i class="material-icons right">play_circle_filled</i>Trailer</a>
            <hr>
            <a class="waves-effect waves-light btn modal-trigger center-align" @click="openMovie" href="#watch">
                <i class="material-icons right">local_movies</i>Watch movie</a>
        </div>
    </div>
</template>

<script>
    import { ENDPOINTS } from '../config/api';

    export default {
        props: {
            'number': {
                type: Number,
                required: true
            },
            'title': {
                type: String,
                required: true
            },
            'description': {
                type: String,
                required: true
            },
            'poster_path': {
                type: String,
                required: true
            },
            'ratting': {
                type: Number,
                required: true
            }
        },

        data() {
            return {
                youtube: ""
            }
        },

        methods: {
            openTrailer() {
                Event.$emit('videopopup', { youtube: this.youtube.key, name: this.title });
            },

            openMovie() {
                Event.$emit('movieplay', this.number);

                let elem = document.getElementById("video-example");
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) {
                    elem.webkitRequestFullscreen();
                }
                elem.play();
            },

            getTrailer() {
                axios.get(ENDPOINTS.URL+this.number+'/'+ENDPOINTS.VIDEO+ENDPOINTS.API_KEY)
                    .then(response => {
                        this.youtube = response.data.results[0];
                    });
            }
        },

        mounted() {

        },

        computed: {
            fullStar: function () {
                return Math.round(this.ratting / 2);
            },
            halfStar: function () {
                return this.ratting % 2 > 1;
            },
            linkImage: function () {
                return ENDPOINTS.URL_PHOTO+this.poster_path;
            }
        }
    }
</script>