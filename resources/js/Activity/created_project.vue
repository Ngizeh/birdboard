<template>
    <div>
        {{ activity.user.name }} created a project
    </div>
</template>

<script>
export default {
    name: "created_project",
    props : {
        activity: { Object }
    }
}
</script>

<style scoped>

</style>
