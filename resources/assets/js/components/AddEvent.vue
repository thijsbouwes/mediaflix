<template>
    <div>
        <form @submit.prevent="addEvent" role="form" method="POST" action="">
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">event</i>
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" data-length="255" v-model="name" required>
                </div>

                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">euro_symbol</i>
                    <label for="price">Price</label>
                    <input id="price" type="number" step="0.01" min="0" class="form-control" name="price" v-model="price" required>
                </div>
            </div>
            <div class="input-field center-align col s12">
                <input type="submit" value="Add event" class="btn waves-effect waves-light">
            </div>
        </form>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                name: "",
                price: "",
            }
        },
        methods: {
            addEvent() {
                axios.post('/api/events', {
                    name: this.name,
                    price: this.price,
                }).then(response => {
                    Event.$emit('newEvent', response.data);
                    this.name = "";
                    this.price = "";
                }).catch(error => {
                   console.log(error.response.data);
                });
            }
        }
    }
</script>