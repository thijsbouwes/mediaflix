<template>
    <table class="highlight">
        <thead>
            <th>Event</th>
            <th>Price</th>
            <th>Date</th>
        </thead>
        <tbody>
            <tr v-for="event in events">
                <td>{{ event.name }}</td>
                <td>{{ event.price }}</td>
                <td>{{ event.created_at }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data() {
            return {
                events: [],
            }
        },

        mounted() {
            Event.$on('newEvent', (data) => this.events.unshift(data) );

            axios.get('/api/events')
                .then(response => this.events = response.data.data);
        },
    }
</script>