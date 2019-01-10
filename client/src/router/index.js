import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home/Index'
import CreateSerie from '@/components/admin/series/Create'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/admin/series/create',
      name: 'Create series',
      component: CreateSerie
    }
  ]
})
