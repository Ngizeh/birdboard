<template>
    <div class="card">
    <div class="border-l-4 border-blue-300 -ml-5 py-3">
        <inertia-link  class="font-normal text-xl py-4 ml-6" :href="'/projects/' + project.id">
            {{ project.title }}
        </inertia-link>
    </div>
    <div class="text-gray-400 py-5">{{ project.description }}</div>
        <div class="text-right" v-if="can">
            <form @submit.prevent="deletePost">
                <bird-board-button class="bg-red-600">Delete</bird-board-button>
            </form>
        </div>
</div>
</template>

<script>
import BirdBoardButton from '@/Components/Button'
    export default {
        name : 'CardComponent',
        components: { BirdBoardButton },
        props : {
            project : Object,
        },
        methods : {
            deletePost() {
                this.$inertia.delete(this.route('projects.destroy', this.project.id))
            },
        },
        computed : {
            can(){
                return this.$page.props.auth.id === this.project.owner_id
            }
        }
    }
</script>
