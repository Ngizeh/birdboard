<template>
    <div>
        {{ activity.user.name }} created a task
    </div>
</template>

<script>
export default {
    name: "created_task",
    props : {
        activity: { Object }
    }
}
</script>

<style scoped>

</style>
