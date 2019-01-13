// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import BootstrapVue from 'bootstrap-vue'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faCoffee } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import axios from 'axios'
import VueAxios from 'vue-axios'
// import VoerroTagsInput from '@voerro/vue-tagsinput'

import router from './router'

Vue.use(BootstrapVue)
Vue.use(VueAxios, axios)
Vue.use(require('vue-moment'))
// Vue.component('tags-input', VoerroTagsInput)

library.add(faCoffee)
library.add(fab)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
