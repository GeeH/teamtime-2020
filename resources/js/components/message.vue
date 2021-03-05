<template>
    <div>
        {{ message }}
    </div>
</template>

<script>
export default {
    props: {
        message: {
            required: true,
            type: String
        }
    }
}
</script>
<style lang="stylus" scoped>
</style>
