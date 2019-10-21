<template>
  <div>
    <section class="content-header">
      <h1>
        SUBIR DÍA - KIDS
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
                <!-- <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Fecha</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>

                    <input
                      v-model="form.fecha"
                      type="text"
                      class="form-control pull-right"
                      id="datepicker"
                      autocomplete="off"
                    />
                  </div>
                </div>-->
                <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Tipo Dia</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>

                    <select v-model="form.tipoDia" class="form-control">
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
                      type="text"
                      class="form-control pull-right"
                      autocomplete="off"
                    />
                  </div>
                </div>

                <div class="form-group col-md-9 text-right">
                  <button class="btn btn-success">Guardar</button>
                </div>

                <div class="form-group col-md-12">
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="mostrarManana()"
                  >Oración de la mañana</button>
                  <button type="button" class="btn btn-primary" @click="mostrarTema()">Tema del día</button>
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="mostrarNoche()"
                  >Oración de la noche</button>
                </div>

                <div class="form-group col-md-12" v-if="mananaVisible">
                  <textarea
                    v-model="form.oracion_manana"
                    class="form-control"
                    rows="10"
                    placeholder="Contenido"
                  ></textarea>
                </div>

                <div class="form-group col-md-12" v-if="temaVisible">
                  <textarea
                    v-model="form.tema_dia"
                    class="form-control mb-2"
                    rows="10"
                    placeholder="Contenido"
                  ></textarea>
                  <input
                    v-model="form.ejercicio"
                    type="text"
                    class="form-control"
                    placeholder="Ejercicio"
                  />
                </div>

                <div class="form-group col-md-12" v-if="nocheVisible">
                  <textarea
                    v-model="form.oracion_noche"
                    class="form-control"
                    rows="10"
                    placeholder="Contenido"
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
      mananaVisible: false,
      temaVisible: false,
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
      axios.post("api/crear-dia-kids", this.form).then(res => {
        console.log(res.data);
      });
    },
    getOracional() {
      axios.get("/api/get-oracional/" + this.form.oracional_id).then(res => {
        this.oracional = res.data;
        this.form.oracional = res.data.nombre;
      });
    },
    mostrarManana() {
      this.mananaVisible = true;
      this.temaVisible = false;
      this.nocheVisible = false;
    },
    mostrarTema() {
      this.mananaVisible = false;
      this.temaVisible = true;
      this.nocheVisible = false;
    },
    mostrarNoche() {
      this.mananaVisible = false;
      this.temaVisible = false;
      this.nocheVisible = true;
    }
  }
};
</script>
