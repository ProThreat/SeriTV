import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home/Index'
import Series from '@/components/Admin/Series/Index'
import CreateSerie from '@/components/Admin/Series/Create'

Vue.use(Router)

export default new Router({
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
