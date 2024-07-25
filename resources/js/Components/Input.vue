<template>
    <input :type="type"
           :value="modelValue"
           class="border border-gray-300 rounded py-2 pl-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
           @input="$emit('input', $event.target.value)"
           >
</template>

<script>
export default {
    name: 'Input',
    props : {
        modelValue: String,
        type : {
            type: String,
            default : 'text',
        }
    },
}
</script>

