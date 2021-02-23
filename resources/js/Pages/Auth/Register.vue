<template>
  <app-component>
      <div class="container w-1/2 mx-auto mt-6">
          <div class="card p-8">
              <form @submit.prevent="register">
                  <h2 class="text-center text-2xl font-bold">Register</h2>
                  <div class="flex flex-col space-y-2">
                      <label class="text-gray-700 font-medium" for="name">Name</label>
                      <input type="text" name="name"
                             id="name"
                             class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                             :class="[ errors.name ? 'border-red-300' : '']"
                             v-model="form.name" autocomplete="name" autofocus>
                      <span v-if="errors.name" class="text-red-300" role="alert">
                        <strong>{{ errors.name }}</strong>
                    </span>
                  </div>
                  <div class="flex flex-col space-y-2 mt-4">
                      <label class="text-gray-700 font-medium" for="email">Email Address</label>
                      <input type="text" name="email"
                             class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                             :class="[ errors.email ? 'border-red-300' : '']"
                             v-model="form.email" required autocomplete="email" autofocus>
                      <span v-if="errors.email" class="text-red-300" role="alert">
                        <strong>{{ errors.email }}</strong>
                    </span>
                  </div>
                  <div class="flex flex-col space-y-2 mt-4">
                      <label class="text-gray-700 font-medium" for="password">Password</label>
                      <input type="password" name="password"
                             id="password"
                             class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                             :class="[ errors.password ? 'border-red-300' : '']"
                             v-model="form.password" required autocomplete="password" autofocus>
                      <span v-if="errors.password" class="text-red-300" role="alert">
                        <strong>{{ errors.password }}</strong>
                    </span>
                  </div>
                  <div class="flex flex-col space-y-2 mt-4">
                      <label class="text-gray-700 font-medium" for="password_confirmation">Confirm Password</label>
                      <input type="password"
                             id="password_confirmation"
                             class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                             name="password_confirmation"
                             v-model="form.password_confirmation"
                             required autocomplete="password_confirmation" autofocus>
                  </div>
                  <div class="flex items-center my-3">
                      <input type="checkbox" name="remember" id="remember" v-model:checked = form.remember>
                      <p class="pl-4">Remember Me</p>
                  </div>
                  <button class="bg-blue-400 rounded text-white py-3 px-6 mr-2" type="submit">
                      Login
                  </button>
              </form>
          </div>
      </div>

  </app-component>
</template>
<script>
import AppComponent from "@/Layouts/AppComponent";
export default {
    components: {AppComponent},
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
