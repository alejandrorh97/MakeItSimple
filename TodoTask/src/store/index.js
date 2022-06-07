import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    usuario: {
      nombre: '',
      email: '',
      rol: '',
      id: ''
    }
  },
  getters: {
  },
  mutations: {
    setUsuario(state, usuario) {
      state.usuario.nombre = usuario.name;
      state.usuario.email = usuario.email;
      state.usuario.rol = usuario.role;
      state.usuario.id = usuario.id;
    }
  },
  actions: {
  },
  modules: {
  }
})
