// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

import Icon from 'vue-awesome/components/Icon'
import 'vue-awesome/icons'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VoerroTagsInput from '@voerro/vue-tagsinput'

import App from './App'
import router from './router'

Vue.use(BootstrapVue)
Vue.use(VueAxios, axios)
Vue.component('v-icon', Icon)
Vue.component('tags-input', VoerroTagsInput)

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
