<template>
  <div>
    <section class="content-header">
      <h1>
        SUBIR DÍA - PUERTA
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
      <form @submit.prevent="storeDia">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-body">
                <div class="form-group col-md-3">
                  <div>
                    <label>Descripción del día</label>
                    <textarea v-model="form.descripcion.contenido" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Tipo Dia</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>

                    <select v-model="form.tipo_dia" class="form-control">
                      <option value>Selecione...</option>
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
                  <button class="btn btn-success">Actualizar</button>
                </div>

                <div class="form-group col-md-12">
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="mostrarColecta()"
                  >Oración colecta</button>
                  <button type="button" class="btn btn-primary" @click="mostrarLecturas()">Lecturas</button>
                  <button type="button" class="btn btn-primary" @click="mostrarSalmos()">Salmos</button>
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="mostrarEvangelio()"
                  >Evangelio</button>
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="mostrarReflexion()"
                  >Reflexión y Oración</button>
                </div>

                <div class="form-group col-md-12" v-if="colectaVisible">
                  <textarea
                    class="form-control"
                    v-model="form.colecta"
                    rows="5"
                    placeholder="Contenido"
                  ></textarea>
                </div>

                <div class="form-group col-md-12" v-if="lecturasVisible">
                  <div class="col-md-6" v-for="(lectura,idx) in form.lecturas" :key="idx">
                    <div class="box-module">
                      <input type="text" class="form-control mb-2" v-model="lectura.titulo" />
                      <input
                        type="text"
                        class="form-control mb-2"
                        v-model="lectura.cita"
                        placeholder="Cita"
                      />
                      <textarea
                        class="form-control"
                        rows="10"
                        v-model="lectura.contenido"
                        placeholder="Contenido"
                      ></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 nuevo">
                    <button
                      type="button"
                      class="btn btn-primary"
                      @click="addLectura"
                    >Agregar Lectura</button>
                  </div>
                </div>

                <div class="form-group col-md-12" v-if="salmosVisible">
                  <div class="col-md-6" v-for="(salmo,idx) in form.salmos" :key="idx">
                    <div class="box-module">
                      <input
                        type="text"
                        class="form-control mb-2"
                        v-model="salmo.cita"
                        placeholder="Salmo"
                      />
                      <input
                        type="text"
                        class="form-control mb-2"
                        v-model="salmo.respuesta"
                        placeholder="Al salmo respondemos:"
                      />
                      <ul class="versiculos">
                        <li v-for="(input,index) in form.salmos[idx].versiculos" :key="index">
                          <input
                            type="text"
                            class="form-control"
                            v-model="input.contenido"
                            placeholder="Versículo"
                          />
                          <span @click="deleteInput(index,idx)">
                            <i class="fa fa-trash"></i>
                          </span>
                        </li>
                      </ul>
                      <button
                        type="button"
                        class="btn btn-primary ml-4"
                        @click="addInput(idx)"
                      >Agregar</button>
                    </div>
                  </div>
                  <div class="col-md-12 nuevo">
                    <button type="button" class="btn btn-primary" @click="addSalmo">Agregar Salmo</button>
                  </div>
                </div>

                <div class="form-group col-md-12" v-if="evangelioVisible">
                  <input
                    type="text"
                    class="form-control mb-2"
                    v-model="form.evangelio.titulo"
                    placeholder="Lectura del evangelio según..."
                  />
                  <textarea
                    class="form-control"
                    v-model="form.evangelio.contenido"
                    rows="10"
                    placeholder="Contenido"
                  ></textarea>
                </div>

                <div class="form-group col-md-12" v-if="reflexionVisible">
                  <input
                    type="text"
                    v-model="form.reflexion.titulo"
                    class="form-control mb-2"
                    placeholder="Título"
                  />
                  <textarea
                    class="form-control mb-2"
                    v-model="form.reflexion.contenido"
                    rows="10"
                    placeholder="Contenido"
                  ></textarea>
                  <textarea
                    class="form-control"
                    rows="5"
                    v-model="form.reflexion.oracion"
                    placeholder="Oración"
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
      data_picker: "form-control pull-right",
      colectaVisible: false,
      lecturasVisible: false,
      salmosVisible: false,
      evangelioVisible: false,
      reflexionVisible: false,
      oraional: [],
      id_dia: this.$route.params.id,
      dia: [],
      form: {}
    };
  },
  created() {
    this.getOracional();
    this.getDia();
  },
  methods: {
    storeDia() {
      axios.post("/api/actualizar-dia-puerta", this.form).then(res => {
        console.log(res.data);
        Vue.swal("Actualizado!!!", "", "success");
      });
    },
    getDia() {
      axios.get("/api/get-admin-dia-puerta/" + this.id_dia).then(res => {
        this.form = res.data;
        console.log(this.form);
      });
    },
    getOracional() {
      axios.get("/api/get-oracional/" + this.form.id_oracional).then(res => {
        this.oracional = res.data;
      });
    },
    addInput(index) {
      this.form.salmos[index].versiculo.push({
        dato: ""
      });
    },
    deleteInput(index, idx) {
      this.form.salmos[idx].versiculo.splice(index, 1);
    },
    addSalmo() {
      this.form.salmos.push({
        salmo: "",
        respuesta: "",
        versiculo: []
      });
    },
    addLectura() {
      this.form.lecturas.push({
        titulo: "",
        cita: "",
        contenido: ""
      });
    },
    deleteSalmo(index) {
      this.inputs.splice(index, 1);
    },
    mostrarColecta() {
      this.colectaVisible = true;
      this.lecturasVisible = false;
      this.salmosVisible = false;
      this.evangelioVisible = false;
      this.reflexionVisible = false;
    },
    mostrarLecturas() {
      this.colectaVisible = false;
      this.lecturasVisible = true;
      this.salmosVisible = false;
      this.evangelioVisible = false;
      this.reflexionVisible = false;
    },
    mostrarSalmos() {
      this.colectaVisible = false;
      this.lecturasVisible = false;
      this.salmosVisible = true;
      this.evangelioVisible = false;
      this.reflexionVisible = false;
    },
    mostrarEvangelio() {
      this.colectaVisible = false;
      this.lecturasVisible = false;
      this.salmosVisible = false;
      this.evangelioVisible = true;
      this.reflexionVisible = false;
    },
    mostrarReflexion() {
      this.colectaVisible = false;
      this.lecturasVisible = false;
      this.salmosVisible = false;
      this.evangelioVisible = false;
      this.reflexionVisible = true;
    }
  }
};
</script>
