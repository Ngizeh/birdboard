<template>
    <span v-if="errors" class="text-red-300" role="alert">
        <strong v-for="error in errors">{{ error }}</strong>
    </span>
</template>

<script>
export default {
    name: "Error",
    computed: {
        errors() {
            return this.$page.props.errors
        }
    }
}
</script>

<style scoped>

</style>
