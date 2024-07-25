require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'

import Vue from 'vue'

Vue.use(plugin)
Vue.mixin({ methods: { route: window.route } })

const el = document.getElementById('app')

new Vue({
    render: h => h(App, {
    props: {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: name => import(`./Pages/${name}`).then(module => module.default),
        resolveErrors: page => (page.props.errors || {}),
    },
  }),
}).$mount(el);

InertiaProgress.init()
