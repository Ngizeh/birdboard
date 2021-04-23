<template>
    <app-component>
        <header>
            <div class="flex justify-between items-center py-4">
                <h3 class="text-gray-400 font-normal pr-4">
                    <inertia-link href="/projects">
                        My Projects / {{ project.title }}
                    </inertia-link>
                </h3>
                <inertia-link :href="route('projects.edit',project.id)" class="button">
                    Edit Task
                </inertia-link>
            </div>
        </header>

        <main>
            <div class="flex">
                <div class="w-3/4 mr-8">
                    <div v-for="task in tasks">
                         <tasks :task="task" :project="project"></tasks>
                    </div>
                    <input class="card mb-3 w-full py-4" @keyup.enter="addTask" placeholder="Begin to add task ...." name="body" v-model="task.body">
                    <h3 class="text-gray-400 font-normal pr-4 mt-6 mb-3">General Notes </h3>
                    <form @submit.prevent="addNotes">
                        <textarea class="card mb-3 w-full h-64" placeholder="Have additional notes ?"
                                  name="notes" v-model="notes">{{ project.notes }}</textarea>
                        <bird-board-button class="bg-blue-400">Add Notes</bird-board-button>
                    </form>
                    <span v-if="status" class="text-red-500 mt-6" role="alert">
                      <strong>{{ status }}</strong>
                    </span>
                </div>
                <div class="w-1/4">
                    <card-component :project="project" :can="can" ></card-component>
                   <card :activities="activities"></card>
                    <div v-if="can">
                        <invitation :project="project" :status="status"></invitation>
                    </div>
                </div>
            </div>
        </main>
    </app-component>
</template>

<script>
import Card from "@/Activity/Card";
import AppComponent from "@/Layouts/AppComponent";
import CardComponent from "@/Components/CardComponent";
import Invitation from "@/Shared/Invitation";
import Tasks from "@/Shared/Tasks";
import BirdBoardButton from "@/Components/Button";
 export default {
     components: {Invitation, AppComponent, CardComponent, Tasks, Card, BirdBoardButton},
     props : {
         project: Object,
         project_tasks: Array,
         activities : Array ,
         can: Boolean,
         status: String,
     },
     data() {
         return {
             tasks : this.project_tasks,
             notes : this.project.notes ,
             task : {
                 body : ''
             },

         }
     },
     methods : {
         addTask(event){
             event.preventDefault();
             axios.post(this.route('tasks.store', this.project), this.task)
                  .then(respone => {
                      this.tasks.push(this.task);
                      this.task = {}
                  })
         },
         addNotes() {
             this.$inertia.patch(this.route('projects.update', this.project), { notes : this.notes})
         },
     },
 }
</script>
