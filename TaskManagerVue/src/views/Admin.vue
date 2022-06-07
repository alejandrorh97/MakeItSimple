<template>
  <div>
    <v-navigation-drawer permanentheight="100vh" width="256" app>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="text-h6">
            {{ usuario.nombre }}
          </v-list-item-title>
          <v-list-item-subtitle>Administrador </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
      <v-divider></v-divider>

      <v-list dense nav>
        <v-list-item link to="/admin/tareas">
          <v-list-item-icon>
            <v-icon>mdi-calendar-text</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>Tareas</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
      <template v-slot:append>
        <div class="pa-2">
          <v-btn color="deep-purple lighten-2" @click="cerrarSesion" block dark>
            Cerrar sesion
          </v-btn>
        </div>
      </template>
    </v-navigation-drawer>
    <router-view/>
  </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
  name: "Admin",
  data() {
    return {
    };
  },
  methods: {
    cerrarSesion() {
      this.$router.push("/");
    },
  },
  computed: {
    ...mapState([
      "usuario",
    ]),
  },
};
</script>