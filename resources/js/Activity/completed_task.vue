<template>
    <div>
        {{ activity.user.name }} completed {{ activity.subject.body }}
    </div>
</template>

<script>
export default {
    name: "completed_task",
    props : {
        activity : Object,
    }

}
</script>

<style scoped>

</style>
