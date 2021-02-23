<template>
    <div>
        <div class="card mt-6">
            <div class="border-l-4 border-blue-300 -ml-5 py-3">
                <p class="font-normal text-xl py-4 ml-6">
                    Invite User
                </p>
            </div>
            <div class="text-right">
                <p class="text-green-500 font-bold text-sm py-2">{{ $page.props.flash }}</p>
                <form @submit.prevent="invitation">
                    <input type="text"
                           name="email"
                           class="border border-gray-300 rounded py-2 w-full pl-6 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                           :class="[$page.props.errors.invitations ? 'border-red-300 ' : '']"
                           autocomplete="email"
                           v-model="form.email"
                           placeholder="Enter email address"
                    >
                    <button type="submit" class="bg-blue-400 mt-4 py-2 px-6 font-bold text-white rounded">Invite</button>
                </form>
                <div v-if="$page.props.errors.invitations" class="text-red-500 mt-5">
                    <ul v-for="error in $page.props.errors.invitations">
                        <li>{{ error }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export  default  {
    props : {
        project : Object,
    },
    data(){
        return {
            form : {
                email: '',
            },
        }
    },
    methods : {
        invitation() {
            this.$inertia.post(this.route('invitations.store', this.project), this.form, {
                errorBag: 'invitations'
            })
            this.form.email = '';
            setTimeout(() => {
                this.$page.props.flash = null;
            }, 3000);
        }
    },
}
</script>
