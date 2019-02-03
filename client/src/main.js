// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'

import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'

import BootstrapVue from 'bootstrap-vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import axios from 'axios'
import VueAxios from 'vue-axios'
import VoerroTagsInput from '@voerro/vue-tagsinput'

import router from './router'

Vue.use(Vuex)
Vue.use(BootstrapVue)
Vue.use(VueAxios, axios)
Vue.use(require('vue-moment'))

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('tags-input', VoerroTagsInput)

library.add(fab)
library.add(far)
library.add(fas)

Vue.config.productionTip = false

const store = new Vuex.Store({
  state: {
    userlogged: 'Logged user'
  },
  mutations: {
    saveUserLogged (state, loggedUser) {
      state.userlogged = loggedUser
    }
  },
  actions: {
    saveUserLogged (context, loggedUser) {
      context.commit('saveUserLogged', loggedUser)
    }
  },
  plugins: [createPersistedState()]
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})
