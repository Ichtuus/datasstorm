import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from '../components/Dashboard'
import Profile from '../components/Profile'
import Tables from '../components/Tables'
import BadGateway from '../components/BadGateway'
import Users from '../components/Users'
import Login from '../components/Login'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: '',
      component: Dashboard,
      props: { page: 1 },
      alias: '/'
    },
    {
      path: '/profile',
      name: 'Profile',
      props: { page: 2 },
      component: Profile
    },
    {
      path: '/tables',
      name: 'Tables',
      props: { page: 3 },
      component: Tables
    },
    {
      path: '/404',
      name: 'BadGateway',
      props: { page: 4 },
      component: BadGateway
    },
    {
      path: '/users',
      name: 'Users',
      props: { page: 5 },
      component: Users
    },
    {
      path: '/login',
      name: 'Login',
      props: { page: 6 },
      component: Login
    },
    {
      path: '*',
      props: { page: 6 },
      redirect: '/404'
    }
  ]
})
