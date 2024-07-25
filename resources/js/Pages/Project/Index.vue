<template>
    <AppComponent>
        <div>
            <div class="flex justify-between items-end mb-3 py-6">
                <h3 class="text-gray-500">My Projects</h3>
                <inertia-link href="/projects/create" class="bg-blue-400 py-3 px-6 rounded-lg text-white" >Add Project</inertia-link>
            </div>
            <div class="grid grid-cols-1 md:grid md:grid-cols-2 lg:grid lg:grid-cols-3 gap-4" v-if="items.length">
                <CardComponent v-for="project in items" :project="project" :key="project.id"></CardComponent>
            </div>
            <div v-else>
                You don't have projects yet
            </div>
        </div>
    </AppComponent>
</template>

<script>
import AppComponent from "@/Layouts/AppComponent";
import CardComponent from "@/Components/CardComponent";
export default {
    components: {AppComponent, CardComponent},
    props : {
        projects : Array,
        can : Boolean,
    },
    computed : {
        items(){
            return this.projects
        }
    },
};
</script>

<style>
</style>
