<template>
    <div id="app" class="bg-gray-100">
        <nav class="bg-white py-4">
            <div class="container mx-auto">
                <div class="flex justify-between py-4 items-center">
                    <a class="navbar-brand" href='/'>
                        Birdboard
                    </a>
                    <ul class="pl-6 mr-auto">
                        <li>
                            <inertia-link href="/projects">Projects</inertia-link>
                        </li>
                    </ul>

                    <div class="" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto flex space-x-6">
                            <template v-if="guest">
                                <li class="nav-item">
                                    <inertia-link href="/login">Login</inertia-link>
                                </li>
                                <li class="nav-item" v-if="canRegister">
                                    <inertia-link href="/register">Register</inertia-link>
                                </li>
                            </template>
                            <li v-else class="nav-item dropdown flex space-x-5">
                                <inertia-link id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ username.name }}
                                    <span class="caret"> </span>
                                </inertia-link>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <inertia-link :href="route('logout')" as="button" method="post">
                                        Logout
                                    </inertia-link>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <main class="py-4 container mx-auto">
            <slot/>
        </main>
    </div>
</template>

<script>
export default {
    name : 'AppComponent',
    computed: {
        username() {
            return this.$page.props.auth
        },
        canLogin() {
            return this.$page.props.canLogin
        },
        canRegister() {
            return this.$page.props.canRegister
        },
        guest() {
            return this.$page.props.guest
        }
    },
}
</script>

<style>

</style>
