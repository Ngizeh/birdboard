<template>
    <button class="rounded text-white py-3 px-6 mr-2" :type="type">
        <slot/>
    </button>
</template>

<script>
export default {
    name: "Button",
    props : {
        type : {
            type: String,
            default : 'submit'
        }
    }
}
</script>

<style scoped>

</style>
