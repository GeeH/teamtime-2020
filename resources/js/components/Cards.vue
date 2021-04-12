<template>
    <div class="flex md:pl-3 md:pr-1 w-content teams">
        <Row v-for="row in people" :key="row.name" :row="row" :timestamp="timestamp"/>
    </div>
</template>

<script>
import Row from './Row';
import axios from "axios";

export default {
    data() {
        return {
            people: null,
            timestamp: Date.now(),
        };
    },

    mounted() {
        axios
            .get('/home/json')
            .then(response => (this.people = response.data));

        setInterval(() => {
            this.timestamp = Date.now();
        }, 30000);
    },

    components: {
        Row,
    }
};
</script>
