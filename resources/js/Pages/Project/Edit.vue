<template>
    <app-component>
        <div class="container w-1/2 mx-auto mt-5">
            <div class="card py-8">
                <h3 class="py-6 text-2xl text-center">Edit the Project</h3>
                <form @submit.prevent="updateProject">
                                <div class="flex flex-col space-y-3">
                                    <label for="title" class="text-lg font-medium">Title</label>
                                    <input type="text"
                                           id="title"
                                           v-model="form.title"
                                           name="title"
                                           class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                                           :class="[ errors.title ? 'border-red-300': '' ]"
                                           required autocomplete="title">

                                    <span v-if="errors.title" class="text-red-500 mt-4" role="alert">
                            <strong>{{ errors.title }}</strong>
                        </span>

                                </div>
                                <div class="flex flex-col space-y-3">
                                    <label for="description" class="text-lg font-medium mt-3">Description</label>
                                    <textarea name="description"
                                              id="description"
                                              class="border h-24 border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                                              :class="[errors.title? 'border-red-300' : '']"
                                              v-model="form.description"
                                              required
                                    >{{ form.description }}</textarea>
                                </div>
                                <span v-if="errors.description" class="text-red-500 mt-4" role="alert">
                        <strong>{{ errors.description }}</strong>
                    </span>

                                <div class="flex mt-6 justify-between items-center">
                                    <button type="submit" class="bg-blue-400 rounded-lg py-3 px-4 text-white mr-2">
                                        Edit Project
                                        <!--                            <slot></slot>-->
                                    </button>
                                    <inertia-link href="/projects">
                                        Cancel
                                    </inertia-link>
                                </div>
<!--                    <form-partial :project="project" :status="status">Edit Project</form-partial>-->
                </form>
            </div>
        </div>
    </app-component>
</template>
<script>
import AppComponent from "@/Layouts/AppComponent";
import FormPartial from "@/Shared/FormPartial";
 export default {
     components: {FormPartial, AppComponent},
     props : {
         project : Object,
         errors : Object
     },
     data() {
         return {
             form : this.project
         }
     },
     methods : {
         updateProject(){
             this.$inertia.patch(this.route('projects.update', this.project.id), this.form)
         }
     }
 }
</script>
