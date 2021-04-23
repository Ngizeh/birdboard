<template>
    <app-component>
        <div class="container w-1/2 mx-auto mt-5">
            <div class="card py-8">
                <h3 class="py-6 text-2xl text-center">Edit the Project</h3>
                <form @submit.prevent="updateProject">
                    <div class="flex flex-col space-y-3">
                         <form-partial :form="form" :errors="errors">Edit Project</form-partial>
                    </div>
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
            form : {
                title : this.project.title,
                description : this.project.description
            }
        }
    },
    methods : {
        updateProject(){
            this.$inertia.patch(this.route('projects.update', this.project.id), this.form)
        }
    }
}
</script>
