<template>
    <div>
        <div v-if="keys.length === 1">
            {{ activity.user.name }} updated the {{ keys }} of the project
        </div>
        <div v-else>
            {{ activity.user.name }} updated a project
        </div>
    </div>
</template>

<script>
export default {
    name: "updated_project",
    props : {
        activity: { Object }
    },
    methods : {
        keys() {
            Object.keys(this.activity.changes['after'])
        }
    },
}
</script>

<style scoped>

</style>
