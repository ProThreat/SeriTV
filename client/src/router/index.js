// Vue
import Vue from 'vue'
import Router from 'vue-router'

// Vue Plugins
import Tabs from 'vue-tabs-component'

// Pages
import Home from '@/components/Home/Index'
import Series from '@/components/Admin/Series/Index'
import CreateSerie from '@/components/Admin/Series/Create'

// Initialize plugins
Vue.use(Router)
Vue.use(Tabs)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/admin/series/',
      name: 'Series',
      component: Series
    },
    {
      path: '/admin/series/create/',
      name: 'Create serie',
      component: CreateSerie
    }
  ]
})
