import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'login',
    component: () => import(/* webpackChunkName: "about" */ '../views/Login.vue')
  },
  {
    path: '/registrar',
    name: 'registrar',
    component: () => import(/* webpackChunkName: "about" */ '../views/Registrar.vue')
  },
  {
    path: '/admin/',
    name: 'Admin',
    component: () => import(/* webpackChunkName: "about" */ '../views/Admin.vue'),
    children: [
      {
        path: 'tareas',
        component: () => import(/* webpackChunkName: "about" */ '../components/Admin/Tareas.vue')
      },
      {
        path: 'usuarios',
        component: () => import(/* webpackChunkName: "about" */ '../components/Admin/Usuarios.vue')
      }
    ]
  },
  {
    path: '/user/',
    name: 'User',
    component: () => import(/* webpackChunkName: "about" */ '../views/User.vue'),
    children: [
      {
        path: 'tareas',
        component: () => import(/* webpackChunkName: "about" */ '../components/User/Tareas.vue')
      }
    ]
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
