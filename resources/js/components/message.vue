<template>
    <div>
        {{ message }}
    </div>
</template>

<script>


export default {
    name: 'message',
    props: {
        message: {
            required: true,
            type: String
        }
    }
}
</script>
