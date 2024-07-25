<template>
    <div class="flex-center position-ref full-height">
        <div v-if="canLogin" class="top-right links">

            <inertia-link v-if="username" :href="route('home')">Home</inertia-link>
           <template v-else>
               <inertia-link :href="route('login')">Login</inertia-link>
               <inertia-link v-if="canRegister" :href="route('register')">Register</inertia-link>
           </template>
        </div>

        <div class="content">
            <div class="title m-b-md">
                BirdBoard
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>
</template>

<script>
	export default {

		name: 'Welcome',
        props : {
		    'canLogin' : Boolean,
		    'canRegister' : Boolean,
        },
        computed: {
            username() {
                return this.$page.props.auth
            },
        },
		data () {
			return {

			}
		}
	}
</script>

<style lang="css" scoped>
html, body {
	background-color: #fff;
	color: #636b6f;
	font-family: 'Nunito', sans-serif;
	font-weight: 200;
	height: 100vh;
	margin: 0;
}

.full-height {
	height: 100vh;
}

.flex-center {
	align-items: center;
	display: flex;
	justify-content: center;
}

.position-ref {
	position: relative;
}

.top-right {
	position: absolute;
	right: 10px;
	top: 18px;
}

.content {
	text-align: center;
}

.title {
	font-size: 84px;
}

.links > a {
	color: #636b6f;
	padding: 0 25px;
	font-size: 13px;
	font-weight: 600;
	letter-spacing: .1rem;
	text-decoration: none;
	text-transform: uppercase;
}

.m-b-md {
	margin-bottom: 30px;
}
</style>
