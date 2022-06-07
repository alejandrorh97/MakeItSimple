<template>
  <div>
    <v-container>
      <v-row>
        <v-col cols="12" md="4">
          <v-card class="col-12">
            <v-text-field
              v-model="titulo"
              label="Titulo"
              required
            ></v-text-field>
            <v-text-field
              v-model="descripcion"
              label="Descripcion"
              required
            ></v-text-field>
            <v-radio-group v-model="radioGroup">
              <v-radio label="Baja" value="Baja"></v-radio>
              <v-radio label="Media" value="Media"></v-radio>
              <v-radio label="Alta" value="Alta"></v-radio>
            </v-radio-group>
            <v-card-actions>
              <v-btn color="deep-purple lighten-2" @click="guardarCambios" dark>
                {{ accion }}
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12" md="8">
          <v-simple-table>
            <template v-slot:default>
              <thead>
                <tr>
                  <th class="text-left">Titulo</th>
                  <th class="text-left">Descripcion</th>
                  <th class="text-left">Estado</th>
                  <th class="text-left">Prioridad</th>
                  <th class="text-left">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="tarea in tareas" :key="tarea.id">
                  <td>{{ tarea.titulo }}</td>
                  <td style="width: 15vw">{{ tarea.descripcion }}</td>
                  <td>
                    <v-checkbox
                      v-model="tarea.estado"
                      :label="tarea.estado ? 'Completada' : 'Pendiente'"
                      @click="completarTarea(tarea)"
                    ></v-checkbox>
                  </td>
                  <td>{{ tarea.prioridad }}</td>
                  <td>
                    <v-btn
                      color="deep-purple lighten-2"
                      small
                      @click="editarTarea(tarea.id)"
                      dark
                    >
                      <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn class="ml-2" color="red lighten-2" small dark @click="eliminarTarea(tarea)">
                      <v-icon>mdi-delete</v-icon>
                    </v-btn>
                  </td>
                </tr>
              </tbody>
            </template>
          </v-simple-table>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import { apiConfig } from "../AxiosConfig";
import { mapState } from "vuex";
export default {
  name: "AdminTareas",
  data() {
    return {
      tareas: [],
      estadoTarea: "Pendiente",
      titulo: "",
      descripcion: "",
      idEdicion: 0,
      accion: "nuevo",
      radioGroup: null,
    };
  },
  computed: {
    tareasFiltro() {
      return this.tareas.filter((tarea) => tarea.estado === this.estadoTarea);
    },
    ...mapState(["usuario"]),
  },
  methods: {
    editarTarea(idTarea) {
      this.idEdicion = idTarea;
      this.titulo = this.tareas.find((tarea) => tarea.id === idTarea).titulo;
      this.descripcion = this.tareas.find(
        (tarea) => tarea.id === idTarea
      ).descripcion;
      this.accion = "editar";
      this.radioGroup = this.tareas.find(
        (tarea) => tarea.id === idTarea
      ).prioridad;
    },
    guardarCambios() {
      if (this.titulo.trim() === "" || this.descripcion.trim() === "") {
        return;
      }
      if (this.accion === "nuevo") {
        apiConfig.post("tasks/create/", {
          titulo: this.titulo,
          descripcion: this.descripcion,
          prioridad: this.radioGroup,
          estado: 0,
          usuario: this.usuario.id,
        });
      } else {
        apiConfig.put(`tasks/update/${this.idEdicion}`, {
          titulo: this.titulo,
          descripcion: this.descripcion,
          prioridad: this.radioGroup,
          estado: 0,
        });
      }
      this.titulo = "";
      this.descripcion = "";
      this.accion = "nuevo";
      this.prioridad = null;
      apiConfig.get(`tasks/${this.usuario.id}`).then((response) => {
        this.tareas = response.data;
      });
    },
    completarTarea(tarea) {
      apiConfig.put(`tasks/update/${tarea.id}`, {
        titulo: tarea.titulo,
        descripcion: tarea.descripcion,
        prioridad: tarea.prioridad,
        estado: tarea.estado !== 0 ? 1 : 0,
      });
      apiConfig.get(`tasks/${this.usuario.id}`).then((response) => {
      this.tareas = response.data;
    });
    },
    eliminarTarea(tarea) {
      apiConfig.delete(`tasks/delete/${tarea.id}`);
      apiConfig.get(`tasks/${this.usuario.id}`).then((response) => {
        this.tareas = response.data;
      });
    },
  },
  mounted() {
    //console.log(this.usuario.id);
    apiConfig.get(`tasks/${this.usuario.id}`).then((response) => {
      this.tareas = response.data;
    });
  },
};
</script>