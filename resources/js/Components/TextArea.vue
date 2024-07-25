<template>
    <textarea
              class="border h-24 border-gray-300 rounded py-2 pl-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
              placeholder="What do you have in mind?"
              :value="value"
              @input="$emit('input', $event.target.value)"
              required
    ></textarea>
</template>

<script>
export default {
    name: "TextArea",
    props : ['modelValue'],
    computed : {
        value () {
            return this.$attrs.value
        }
    }
}
</script>

<style scoped>

</style>
