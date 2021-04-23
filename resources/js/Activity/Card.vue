<template>
    <div class="card mt-4" v-if="activities">
        <ul v-for="activity in activities">
            <li>
                <component :is="activity.description" :activity="activity"></component>
                <span class="text-gray-400 text-sm">{{ ago(activity.created_at) }}</span>

            </li>
        </ul>
    </div>
</template>

<script>
   import completed_task from "./completed_task";
   import created_task from "./created_task";
   import created_project from "./created_project";
   import deleted_task from "./deleted_task";
   import incomplete_task from "./incomplete_task";
   import updated_project from "./updated_project";
   import moment from 'moment';
    export default {
        components : { completed_task, created_task, created_project, deleted_task, incomplete_task,updated_project},
        name: 'Card',
        props : {
            activities : Array
        },
        methods : {
            ago(activity){
                return moment(activity).fromNow();
            }
        }
    };
</script>
