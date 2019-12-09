<template>
  <div>
    <section class="content-header">
      <h1>
        SUBIR DÍA - ADULTOS
        <small>El Man Está Vivo</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> Oracionales
          </a>
        </li>
        <li class="active">Aqui</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Main content -->
      <form @submit.prevent="store">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-body">
                <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Tipo Dia</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>

                    <select v-model="form.tipoDia" class="form-control" required>
                      <option value>Selecione...</option>
                      <option value="Lunes">Lunes</option>
                      <option value="Martes">Martes</option>
                      <option value="Miercoles">Miercoles</option>
                      <option value="Jueves">Jueves</option>
                      <option value="Viernes">Viernes</option>
                      <option value="Sabado">Sabado</option>
                      <option value="Domingo">Domingo</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Dia</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>

                    <input
                      v-model="form.dia"
                      type="number"
                      class="form-control pull-right"
                      autocomplete="off"
                      required
                    />
                  </div>
                </div>

                <div class="form-group col-md-9 text-right">
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <div class="form-group col-md-12">
                  <button type="button" class="btn btn-primary" @click="mostrarTema()">Tema del día</button>
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="mostrarOraciones()"
                  >Oración de la mañana y noche</button>
                </div>

                <div class="form-group col-md-12" v-if="temaVisible">
                  <input
                    type="text"
                    v-model="form.tema[0].titulo"
                    class="form-control mb-2"
                    placeholder="Título"
                    required
                  />
                  <input
                    type="text"
                    v-model="form.tema[0].oracion"
                    required
                    class="form-control mb-2"
                    placeholder="Oración"
                  />
                  <textarea
                    v-model="form.tema[0].contenido"
                    required
                    class="form-control"
                    rows="10"
                    placeholder="Contenido"
                  ></textarea>
                </div>

                <div class="form-group col-md-12" v-if="oracionesVisible">
                  <div class="col-md-12 mb-2 px-0">
                    <input
                      v-model="form.tarea_dia"
                      type="text"
                      class="form-control"
                      placeholder="Tarea del día"
                      required
                    />
                  </div>
                  <div class="col-md-6 pl-0">
                    <textarea
                      v-model="form.oracion_manana"
                      class="form-control"
                      rows="10"
                      placeholder="Oración de la mañana"
                      required
                    ></textarea>
                  </div>
                  <div class="col-md-6 pr-0">
                    <textarea
                      v-model="form.oracion_noche"
                      class="form-control"
                      rows="10"
                      placeholder="Oracion de la noche"
                      required
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- /.content -->
    </section>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
export default {
  components: {
    Datepicker,
    props: [
      {
        inline: true
      }
    ]
  },
  data() {
    return {
      temaVisible: false,
      oracionesVisible: false,
      oracional: "",
      form: {
        tema: [
          {
            titulo: null,
            contenido: null,
            oracion: null
          }
        ],
        oracional_id: this.$route.params.id
      }
    };
  },
  created() {
    this.getOracional();
  },
  methods: {
    store() {
      if (this.form.tema.titulo === null || this.form.tarea_dia == null) {
        Vue.swal("Error", "Verifica los datos", "error");
      } else {
        axios
          .post("api/crear-dia-adultos", this.form)
          .then(res => {
            Vue.swal("Excelente", "Día agregado correctamente", "success");
            this.form = {
              tema: [
                {
                  titulo: "",
                  contenido: "",
                  oracion: ""
                }
              ]
            };
          })
          .catch(error => {
            Vue.swal("Error", "Verifica los datos", "error");
          });
      }
    },
    getOracional() {
      axios.get("/api/get-oracional/" + this.form.oracional_id).then(res => {
        this.oracional = res.data;
        this.form.oracional = res.data.nombre;
      });
    },
    mostrarTema() {
      this.temaVisible = true;
      this.oracionesVisible = false;
    },
    mostrarOraciones() {
      this.oracionesVisible = true;
      this.temaVisible = false;
    }
  }
};
</script>
