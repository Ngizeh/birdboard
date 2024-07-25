<template>
    <div>
        {{ activity.user.name }} delete task
    </div>
</template>

<script>
export default {
    name: "deleted_task",
    props : {
        activity: { Object }
    }
}
</script>

<style scoped>

</style>
