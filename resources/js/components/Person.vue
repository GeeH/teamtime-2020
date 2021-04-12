<template>
    <div class="w-full bg-white rounded-md shadow-lg mb-4">
        <div class="bg-gray-200 border-b border-gray-200 rounded-t-lg">
            <div class="flex items-center justify-between flex-wrap sm:flex-no-wrap py-3half px-4">
                <div class="">
                    <h3 class="font-bold text-gray-900 py-2">
                        {{ person.name }}
                    </h3>
                </div>
            </div>
        </div>
        <p class="text-center mt-4 px-4 text-gray-900 person-time text-sm"
           data-timezone="{{ person.timezone }}">
         <span class="text-4xl font-bold">
            {{ timeString }}
         </span>
        </p>
        <span class="hidden" data-id="{{ person.id }}"></span>

        <div>
            <div class="mt-1 text-right p-2">
                <a type="button" href="#"
                   class="text-gray-500">
                    <i class="fas fa-user-edit"></i>
                </a>
                <a type="button" href="#"
                   class="text-gray-500">
                    <i class="fas fa-user-slash"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>

import moment from "moment-timezone";

export default {

    props: {
        person: {},
        timestamp: null,
    },

    computed: {
        timeString() {
            return moment(this.timestamp).tz(this.person.timezone).format('HH:mm')
        },
    }
};
</script>
