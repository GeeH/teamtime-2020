<template>
    <div class="team mr-2 w-1/6 table">
        <div class="bg-card rounded-md px-5 py-5 mb-8 bg-gray-600">
            <h3 class="pl-1 text-lg font-bold text-white mb-5">{{ row.name }}</h3>
            <Person v-for="person in row.person" :key="person.id" :person="person" :timestamp="timestamp"/>
        </div>
    </div>
</template>

<script>
import Person from './Person';

export default {
    props: {
        row: {},
        timestamp: null,
    },
    components: {
        Person
    }
};
</script>
