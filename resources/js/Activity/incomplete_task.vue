<template>
    <div>
        {{ activity.user.name }} marked  {{ activity.subject.body }} as incomplete
    </div>
</template>

<script>
export default {
    name: "incomplete_task",
    props : {
        activity: { Object }
    }
}
</script>

<style scoped>

</style>
