<template>
    <label class="text-gray-700 font-medium">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

<script>
export default {
    name: "Label",
    props : ['value']
}
</script>

<style scoped>

</style>
