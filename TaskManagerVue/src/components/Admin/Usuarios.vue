<template>
  <div>
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Nombre</th>
            <th class="text-left">Correo</th>
            <th class="text-left">Rol</th>
            <th class="text-left">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="usuario in usuarios" :key="usuario.nombre">
            <td>{{ usuario.nombre }}</td>
            <td>{{ usuario.email }}</td>
            <td>{{ usuario.rol }}</td>
            <td>
              <v-btn
                color="deep-purple lighten-2"
                small
                @click="convertirRole(usuario.email, usuario.rol)"
              >
                Cambiar rol
              </v-btn>
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>
<script>
import { apiConfig } from "../AxiosConfig";
import { mapState } from "vuex";
export default {
  name: "Usuarios",

  data() {
    return {
      usuarios: [],
    };
  },
  methods: {
    convertirRole(email, rol) {
      if (rol == "admin") {
        this.usuarios.find((usuario) => usuario.email === email).rol = "user";
      } else {
        this.usuarios.find((usuario) => usuario.email === email).rol = "admin";
      }
    },
  },
  computed: {
    ...mapState(["usuario"]),
  },
  async mounted(){
    await apiConfig.get("sanctum/csrf-cookie");
    apiConfig.get(`/users/all/${this.usuario.id}`).then((response) => {
      this.usuarios = response.data;
    });
  }
};
</script>