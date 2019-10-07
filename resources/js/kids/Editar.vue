<template>
  <div>
    <section class="content-header">
      <h1>
        EDITAR - KIDS
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
                  <label for="exampleInputPassword1">Fecha</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input
                      type="text"
                      class="form-control pull-right"
                      id="datepicker"
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
export default {
  data() {
    return {
      mananaVisible: false,
      temaVisible: false,
      nocheVisible: false,
      id_dia: this.$route.params.id,
      oracional: [],
      form: {
        oracional_id: this.$route.params.id
      }
    };
  },
  created() {
    this.getOracional();
    this.getDia();
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
    getDia() {
      axios.get("/api/get-dia-kids/" + this.id_dia).then(res => {
        this.form = res.data;
        console.log(res.data);
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
