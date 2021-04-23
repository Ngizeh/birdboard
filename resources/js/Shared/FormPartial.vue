<template>
    <div>
        <div class="flex flex-col space-y-3">
           <bird-board-label for="title" value="Title"/>
            <bird-board-input v-model="form.title" :class="[errors.title ? 'border-red-300' : '' ]" required autofocus/>
            <bird-board-error/>
        </div>
        <div class="flex flex-col space-y-3">
            <bird-board-label for="description" value="Description"/>
            <bird-board-text-area v-model="form.description" :class="[errors.description ? 'border-red-300' : '' ]" required autofocus/>
            <bird-board-error/>
        </div>
        <div class="flex mt-6 justify-between items-center">
            <button type="submit" class="bg-blue-400 rounded-lg py-3 px-4 text-white mr-2">
                <slot/>
            </button>
            <inertia-link href="/projects">
                Cancel
            </inertia-link>
        </div>
    </div>
</template>
<script>
import BirdBoardInput from "@/Components/Input"
import BirdBoardButton from "@/Components/Button"
import BirdBoardLabel from "@/Components/Label"
import BirdBoardError from "@/Components/Error"
import BirdBoardTextArea from "@/Components/TextArea"
export default {
    name : 'FormPartial',
    components: { BirdBoardInput, BirdBoardButton, BirdBoardLabel, BirdBoardError, BirdBoardTextArea},
    props : {
        errors : Object,
        form : Object
    },
}
</script>
