<template>
  <div>
    <section class="content-header">
      <h1>
        EDITAR - ADULTOS
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
      <form @submit.prevent="update">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-body">
                <!-- <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Fecha</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <datepicker v-model="form.fecha" class="form-control pull-right"></datepicker>
                  </div>
                </div>-->
                <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Tipo Dia</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>

                    <select v-model="form.tipo_dia" class="form-control">
                      <option>Selecione...</option>
                      <option value="Lunes">Lunes</option>
                      <option value="Martes">Martes</option>
                      <option value="Miércoles">Miércoles</option>
                      <option value="Jueves">Jueves</option>
                      <option value="Viernes">Viernes</option>
                      <option value="Sábado">Sábado</option>
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
                    />
                  </div>
                </div>
                <div class="form-group col-md-9 text-right">
                  <button type="submit" class="btn btn-success">Actualizar</button>
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
                    v-model="form.tema.titulo"
                    class="form-control mb-2"
                    placeholder="Título"
                  />
                  <input
                    type="text"
                    v-model="form.tema.oracion"
                    class="form-control mb-2"
                    placeholder="Oración"
                  />
                  <textarea
                    v-model="form.tema.contenido"
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
                    />
                  </div>
                  <div class="col-md-6 pl-0">
                    <textarea
                      v-model="form.oracion_manana"
                      class="form-control"
                      rows="10"
                      placeholder="Oración de la mañana"
                    ></textarea>
                  </div>
                  <div class="col-md-6 pr-0">
                    <textarea
                      v-model="form.oracion_noche"
                      class="form-control"
                      rows="10"
                      placeholder="Oracion de la noche"
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
import toastr from "toastr";
toastr.options = {
  closeButton: true,
  timeOut: "10000"
  // "progressBar": true,
};
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
      id_dia: this.$route.params.id,
      form: {
        tema: [
          {
            titulo: "",
            contenido: "",
            oracion: ""
          }
        ],
        oracional_id: this.$route.params.id
      }
    };
  },
  created() {
    this.getOracional();
    this.getDia();
  },
  methods: {
    update() {
      axios.post("api/update-dia-adultos", this.form).then(res => {
        toastr.success("Correctamente", "Oracional Actualizado");
      });
    },
    getDia() {
      axios.get("/api/get-admin-dia-adultos/" + this.id_dia).then(res => {
        this.form = res.data;
      });
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
