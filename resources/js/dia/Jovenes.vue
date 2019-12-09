<template>
  <div>
    <section class="content-header">
      <h1>
        SUBIR DÍA - JÓVENES
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

                    <select v-model="form.tipo_dia" class="form-control" required>
                      <option value="Seleccione...">Selecione...</option>
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
                      type="text"
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
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="mostrarManana()"
                  >Oración de la mañana</button>
                  <button type="button" class="btn btn-primary" @click="mostrarFlexion()">Reflexión</button>
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="mostrarNoche()"
                  >Oración de la noche</button>
                </div>

                <div class="form-group col-md-12" v-if="mananaVisible">
                  <textarea
                    class="form-control"
                    v-model="form.oracion_manana"
                    rows="10"
                    placeholder="Contenido"
                    required
                  ></textarea>
                </div>

                <div class="form-group col-md-12" v-if="reflexionVisible">
                  <textarea
                    class="form-control mb-2"
                    v-model="form.reflexion"
                    rows="10"
                    placeholder="Contenido"
                    required
                  ></textarea>
                  <input
                    type="text"
                    v-model="form.ejercicio"
                    class="form-control"
                    placeholder="Ejercicio"
                    required
                  />
                </div>

                <div class="form-group col-md-12" v-if="nocheVisible">
                  <textarea
                    v-model="form.oracion_noche"
                    class="form-control"
                    rows="10"
                    placeholder="Contenido"
                    required
                  ></textarea>
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
export default {
  data() {
    return {
      mananaVisible: false,
      reflexionVisible: false,
      nocheVisible: false,
      oracional: [],
      form: {
        oracional_id: this.$route.params.id
      }
    };
  },
  created() {
    this.getOracional();
  },
  methods: {
    store() {
      if (
        this.form.oracion_manana == null ||
        this.form.reflexion == null ||
        this.form.oracion_noche == null
      ) {
        Vue.swal("Error", "Faltan campos por llenar", "error");
      } else {
        axios
          .post("api/crear-dia-jovenes", this.form)
          .then(res => {
            Vue.swal("Excelente", "Día agregado correctamente", "success");
            this.form = {};
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
    mostrarManana() {
      this.mananaVisible = true;
      this.reflexionVisible = false;
      this.nocheVisible = false;
    },
    mostrarFlexion() {
      this.mananaVisible = false;
      this.reflexionVisible = true;
      this.nocheVisible = false;
    },
    mostrarNoche() {
      this.mananaVisible = false;
      this.reflexionVisible = false;
      this.nocheVisible = true;
    }
  }
};
</script>
