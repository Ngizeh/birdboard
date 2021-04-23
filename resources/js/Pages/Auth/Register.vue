<template>
  <app-component>
      <div class="container w-1/2 mx-auto mt-6">
          <div class="card p-8">
              <form @submit.prevent="register">
                  <h2 class="text-center text-2xl font-bold">Register</h2>
                  <div class="flex flex-col space-y-2">
                      <bird-board-label for="email" value="Name"/>
                      <bird-board-input v-model="form.name" :class="[errors.name ? 'border-red-300' : '' ]" required autocomplete="email" autofocus/>
                      <bird-board-error/>
                  </div>
                  <div class="flex flex-col space-y-2 mt-4">
                      <bird-board-label for="email" value="Email"/>
                      <bird-board-input v-model="form.email" :class="[errors.email ? 'border-red-300' : '' ]" required autocomplete="email" autofocus/>
                      <bird-board-error/>
                  </div>
                  <div class="flex flex-col space-y-2 mt-4">
                      <bird-board-label for="email" value="Password"/>
                      <bird-board-input v-model="form.password" :class="[errors.password ? 'border-red-300' : '' ]" required autocomplete="email" autofocus/>
                      <bird-board-error/>
                  </div>
                  <div class="flex flex-col space-y-2 mt-4">
                      <bird-board-label for="email" value="Confirm Password"/>
                      <bird-board-input v-model="form.password_confirmation" type="password" :class="[errors.password_confirmation ? 'border-red-300' : '' ]" required autocomplete="email" autofocus/>
                      <bird-board-error/>
                  </div>
                  <div class="flex items-center my-3">
                      <input type="checkbox" name="remember" id="remember" v-model:checked = form.remember>
                      <p class="pl-4">Remember Me</p>
                  </div>
                  <bird-board-button>Login</bird-board-button>

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
    name : 'Register',
    components: {AppComponent, BirdBoardInput, BirdBoardLabel, BirdBoardError,BirdBoardButton},
    props : {
        errors : Object
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                remember: null
            }
        }
    },
    methods : {
        register(){
            this.$inertia.post('/register', this.form)
        }
    }
}
</script>
