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
        <form method="POST" @submit.prevent="store">
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
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table">
                    <tr>
                      <th>Id</th>
                      <th>Oracional</th>
                      <th>Plan</th>
                      <th>Estadi</th>
                    </tr>
                    <tr v-for="sus in suscripciones" :key="sus.id">
                      <td>{{sus.id}}</td>
                      <td>{{sus.nombre_oracional}}</td>
                      <td>{{sus.plan}}</td>
                      <td>
                        <input type="checkbox" v-model="sus.state" />
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
    getUsuario() {
      axios.get("/api/usuario/" + this.form.id).then(res => {
        this.form = res.data;
        console.log(res.data);
        // Vue.swal("Usuario Creado!!!", "", "success");
      });
    },
    getSuscripciones() {
      axios.get("/api/suscripciones/" + this.form.id).then(res => {
        this.suscripciones = res.data;
        console.log(res.data);
        // Vue.swal("Usuario Creado!!!", "", "success");
      });
    },
    edit() {
      this.editar = true;
      // Vue.swal("Usuario Creado!!!", "", "success");
    }
  }
};
</script>
