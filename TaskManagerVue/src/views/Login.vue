<template>
  <div>
    <v-container fluid fill-height style="width: 30vw">
      <v-row>
        <h1 class="col-12">Inicio de sesion</h1>
        <v-card class="col-12">
          <v-text-field
            v-model="email"
            :rules="emailRules"
            label="Correo electronico"
            required
          ></v-text-field>
          <v-text-field
          type="password"
            v-model="password"
            label="Contraseña"
            :rules="passwordRules"
            required
          ></v-text-field>
          <v-card-actions>
            <v-btn color="deep-purple lighten-2" @click="login" dark>
              Iniciar sesion
            </v-btn>

            <v-btn color="deep-purple lighten-2" to="/registrar" text> Crear cuenta </v-btn>
          </v-card-actions>
        </v-card>
      </v-row>
    </v-container>
    <v-snackbar v-model="notificacion" :timeout="3000">
      {{ mensaje }}
      <template v-slot:action="{ attrs }">
        <v-btn
          color="deep-purple"
          text
          v-bind="attrs"
          @click="notificacion = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
  </div>
</template>

<script>
import { apiConfig } from "../AxiosConfig";
//import axios from "axios";
import { mapMutations } from "vuex";

export default {
  name: "Login",
  data() {
    return {
      valid: false,
      email: "",
      emailRules: [
        (v) => !!v || "El correo es requerido",
        (v) => /.+@.+/.test(v) || "Ingrese un correo valido",
      ],
      password: "",
      passwordRules: [(v) => !!v || "La contraseña es requerida"],
      notificacion: false,
      mensaje: "",
    };
  },
  methods: {
    async login() {
      if (this.email.length === 0 || this.password.length === 0) {
        this.notificacion = true;
        this.mensaje = "Ingrese un correo y una contraseña";
        return;
      }
      //llamar la api de iniciar sesion
      await apiConfig.get("sanctum/csrf-cookie");
      const response = await apiConfig.post("users/login/", {
        email: this.email,
        password: this.password,
      });

      // console.log(response);
      if (response.status === 200) {
        this.setUsuario(response.data.usuario);
        if (response.data.usuario.role === "admin") {
          this.$router.push("/admin");
        } else {
          this.$router.push("/user");
        }
      } else {
        this.notificacion = true;
        this.mensaje = "Correo o contraseña incorrectos";
      }
    },
    ...mapMutations(["setUsuario"]),
  },
};
</script>

