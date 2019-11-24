<template>
  <div>
    <section class="content-header">
      <h1>
        CREAR USUARIO
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
    <section class="content container-fluid">
      <!-- Main content -->
      <section class="content">
        <form method="POST" @submit.prevent="updateUsuario">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">INFORMACIÓN GENERAL</h3>
                </div>
                <div class="box-body">
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Nombre"
                      v-model="form.name"
                      :disabled="!editar"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Email</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Email"
                      v-model="form.email"
                      :disabled="!editar"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Contraseña"
                      v-model="form.password"
                      :disabled="!editar"
                    />
                  </div>
                  <div class="form-group col-md-12">
                    <button v-if="editar" type="submit" class="btn btn-primary">
                      <span>Crear</span>
                    </button>
                    <a v-if="!editar" @click="edit" class="btn btn-primary">
                      <span>Editar</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Suscripciones</h3>
                  <a
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                  >Crear suscripción</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table">
                    <tr>
                      <th>Id</th>
                      <th>Oracional</th>
                      <th>Plan</th>
                      <th>Estado</th>
                    </tr>
                    <tr v-for="sus in suscripciones" :key="sus.id">
                      <td>{{sus.id}}</td>
                      <td>{{sus.nombre_oracional}}</td>
                      <td>{{sus.plan}}</td>
                      <td>
                        <input
                          type="checkbox"
                          @change="updateStateSucription(sus.id)"
                          v-model="sus.state"
                        />
                        Activo
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.box -->

              <!-- /.box -->
            </div>
          </div>
        </form>
      </section>
      <!-- /.content -->
    </section>

    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <form @submit.prevent="storeOracional">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Crear suscripcion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Nombre oracional</label>
                <select class="form-control" v-model="suscripcion.oracional">
                  <option>Seleccione...</option>
                  <option value="Jovenes">Jovenes</option>
                  <option value="Adultos">Adultos</option>
                  <option value="Kids">Kids</option>
                  <option value="Puerta">Puerta</option>
                </select>
              </div>
              <input type="hidden" v-model="suscripcion.id" />
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Plan</label>
                <select class="form-control" v-model="suscripcion.plan">
                  <option value>Seleccione...</option>
                  <option value="1 año">1 año</option>
                  <option value="1 mes">1 mes</option>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Crear</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style>
.my-2 {
  margin: 10px 0;
}
</style>

<script>
export default {
  data() {
    return {
      editar: false,
      suscripcion: {
        id: this.$route.params.id
      },
      form: {
        id: this.$route.params.id
      },
      suscripciones: {}
    };
  },
  created() {
    this.getUsuario();
    this.getSuscripciones();
  },
  methods: {
    storeOracional() {
      console.log(this.suscripcion);
    },
    updateUsuario() {
      axios.post("api/update-user", this.form).then(res => {
        Vue.swal("Usuario actualizado!!!", "", "success");
        this.editar = false;
      });
    },
    getUsuario() {
      axios.get("/api/usuario/" + this.form.id).then(res => {
        this.form = res.data;
      });
    },
    getSuscripciones() {
      axios.get("/api/admin-suscripciones/" + this.form.id).then(res => {
        this.suscripciones = res.data;
        // Vue.swal("Usuario Creado!!!", "", "success");
      });
    },
    updateStateSucription(id) {
      axios.get("/api/update-state-suscription/" + id).then(res => {
        console.log(res.data);
        Vue.swal("Suscripcion actualizada!!!", "", "success");
      });
    },
    edit() {
      this.editar = true;
      // Vue.swal("Usuario Creado!!!", "", "success");
    }
  }
};
</script>
