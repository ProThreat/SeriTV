// Vue
import Vue from 'vue'
import Router from 'vue-router'

// Pages
import Register from '@/components/Global/Register'
import Login from '@/components/Global/Login'

import Home from '@/components/Home/Index'
import Series from '@/components/Front/Series'
import Movies from '@/components/Front/Movies'

import AdminSeries from '@/components/Admin/Series/Index'
import AdminCreateSerie from '@/components/Admin/Series/Create'
import AdminMovies from '@/components/Admin/Movies/Index'
import AdminCreateMovies from '@/components/Admin/Movies/Create'

// Initialize plugins
Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/movies',
      name: 'Movies',
      component: Movies
    },
    {
      path: '/series',
      name: 'Series',
      component: Series
    },
    {
      path: '/admin/series/',
      name: 'Admin Series',
      component: AdminSeries
    },
    {
      path: '/admin/series/create/',
      name: 'Admin Create serie',
      component: AdminCreateSerie
    },
    {
      path: '/admin/movies/',
      name: 'Admin Movies',
      component: AdminMovies
    },
    {
      path: '/admin/movies/create/',
      name: 'Admin Create movie',
      component: AdminCreateMovies
    }
  ]
})
