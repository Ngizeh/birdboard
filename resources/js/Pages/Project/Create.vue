<template>
    <app-component>
        <div class="container w-1/2 mx-auto mt-5">
            <div class="card py-8">
                <h3 class="py-6 text-2xl text-center">Let Create Something New</h3>
                <form @submit.prevent="addProject">
                    <div class="flex flex-col space-y-3">
                        <form-partial :errors="errors" :form="form"> Add Project</form-partial>
                    </div>
                </form>
            </div>
        </div>
    </app-component>
</template>
<script>
import AppComponent from "@/Layouts/AppComponent";
import FormPartial from "@/Shared/FormPartial";
import BirdBoardLabel from "@/Components/Label";
export default {
    components: {FormPartial, AppComponent, BirdBoardLabel},
    props : {
        project : Array,
        errors : Object
    },
    data() {
        return {
            form : {
                title: '',
                description : ''
            }
        }
    },
    methods : {
        addProject(){
            this.$inertia.post(this.route('projects.store'), this.form)
        },
    }
}
</script>
