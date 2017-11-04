<template>
    <section class="movie-list">
        <div class="row" v-for="i in Math.ceil(movies.length / 4)">
            <div class="col s12 l3 m4" v-for="movie in movies.slice((i - 1) * 4, i * 4)">
                <movie v-bind:title="movie.title"
                       v-bind:number="movie.id"
                       v-bind:description="movie.overview"
                       v-bind:poster_path="movie.poster_path"
                       v-bind:ratting="movie.vote_average">
                </movie>
            </div>
        </div>
    </section>
</template>

<script>
    import { ENDPOINTS } from '../config/api';

    export default {
        data() {
            return {
                movies: [],
            }
        },

        mounted() {
            axios.get(ENDPOINTS.URL+ENDPOINTS.POPULAR+ENDPOINTS.API_KEY)
                .then(response => {
                    this.movies = response.data.results
                });
        },
    }
</script>