<template>
    <section class="movie-list">
        <div class="row" v-for="i in Math.ceil(movies.length / 4)">
            <div class="col s12 l3 m4" v-for="movie in movies.slice((i - 1) * 4, i * 4)">
                <movie v-bind:title="movie.title"
                       v-bind:description="movie.overview"
                       v-bind:poster_path="movie.poster_path">
                </movie>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                movies: [],
            }
        },

        mounted() {
            axios.get('https://api.themoviedb.org/3/movie/popular?api_key=154caf561d5edfa26777372470a6dd01')
                .then(response => {
                    this.movies = response.data.results
//                    console.log(response.data)
                });
//                .then(response => this.events = response.data.data);
        },
    }
</script>