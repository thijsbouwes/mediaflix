<template>
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" v-bind:src="linkImage">
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">{{ title }}<i class="material-icons right">more_vert</i></span>
            <p class="reviews"><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star_half</i></p>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">{{ title }}<i class="material-icons right">close</i></span>
            <p v-text="description"></p>
            <button class="btn waves-effect waves-light" type="submit" name="action">Trailer
                <i class="material-icons right">play_circle_filled</i>
            </button>
            <button class="btn waves-effect waves-light right" type="submit" name="action">Watch movie
                <i class="material-icons right">local_movies</i>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
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
            }
        },

        data() {
            return {
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
//http://image.tmdb.org/t/p/w500//gj282Pniaa78ZJfbaixyLXnXEDI.jpg
        computed: {
            linkImage: function () {
                return "http://image.tmdb.org/t/p/w500/"+this.poster_path;
            }
        }
    }
</script>