<template>
    <app-component>
        <div class="container w-1/2 mx-auto mt-6">
            <div class="card p-8">
                <form @submit.prevent="login">
                    <h2 class="text-center text-2xl font-bold">Login</h2>
                    <div class="flex flex-col space-y-2">
                        <bird-board-label for="email" value="Email"/>
                        <bird-board-input v-model="form.email" :class="[errors.email ? 'border-red-300' : '' ]" required autocomplete="email" autofocus/>
                        <bird-board-error/>
                    </div>
                    <div class="flex flex-col space-y-2 mt-4">
                        <bird-board-label for="email" value="Password"/>
                        <bird-board-input v-model="form.password" type="password" :class="[errors.password ? 'border-red-300' : '' ]" required autocomplete="email" autofocus/>
                        <bird-board-error/>
                    </div>
                    <div class="flex items-center my-3">
                        <input type="checkbox" name="remember" id="remember" v-model:checked = "form.remember">
                        <p class="pl-4">Remember Me</p>
                    </div>
                    <bird-board-button class="bg-blue-400">Login</bird-board-button>
                    <inertia-link v-if="forgotPass" :href="route('password.request') ">
                        Forgot Your Password?
                    </inertia-link>
                </form>
            </div>
        </div>
    </app-component>
</template>
<script>
import AppComponent from "@/Layouts/AppComponent";
import BirdBoardInput from "@/Components/Input";
import BirdBoardLabel from "@/Components/Label";
import BirdBoardError from "@/Components/Error";
import BirdBoardButton from "@/Components/Button";
export default {
    name : 'Login',
    components: {AppComponent, BirdBoardInput, BirdBoardLabel, BirdBoardError,BirdBoardButton},
    props : {
        forgotPass : Boolean,
        errors : Object
    },
    data() {
        return {
            form : {
                email : '',
                password : '',
                remember : null
            }
        }
    },
    methods : {
        login(){
            this.$inertia.post(this.route('login'), this.form)
        }
    }
}
</script>
