<template>
  <div>
    <section class="content-header">
      <h1>
        SOPORTE
        <small>El Man Está Vivo</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="#/soporte">
            <i class="fa fa-dashboard"></i> Soporte
          </a>
        </li>
        <li class="active">Aqui</li>
      </ol>
    </section>
    <section class="content container-fluid">
      <!-- Main content -->
      <section class="content">
        <form method="POST" @submit.prevent="storeSoporte">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="form-group col-md-6">
                    <label>ESTADO</label>
                    <select class="form-control" v-model="form.estado">
                      <option value>Seleccione...</option>
                      <option value="Abierto">Abierto</option>
                      <option value="Cerrado">Cerrado</option>
                      <option value="En proceso">En proceso</option>
                    </select>
                  </div>
                </div>
                <div class="box-body">
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" class="form-control" v-model="form.users.name" disabled />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" v-model="form.users.email" disabled />
                  </div>
                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Comentario</label>
                    <textarea
                      class="form-control my-2"
                      v-model="form.comentario"
                      rows="10"
                      disabled
                    ></textarea>
                  </div>
                </div>
                <div class="box-footer">
                  <button v-if="!creando" type="submit" class="btn btn-default">
                    <span>Actualizar</span>
                  </button>
                  <a href="#" v-else class="btn btn-default">Enviando...</a>
                  <!-- <button type="submit" class="btn btn-default text-right">
                    <span>Responder</span>
                  </button>-->
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Historial</h3>
                </div>
              </div>
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
      creando: false,
      id: this.$route.params.id,
      form: {
        users: {
          name: "",
          email: ""
        }
      }
    };
  },
  created() {
    this.getSoporte();
  },
  methods: {
    storeSoporte() {
      this.creando = true;
      axios.post("/api/update-soporte", this.form).then(res => {
        if (res.data.status == 200) {
          Vue.swal("", "Actualizado correctamente", "success");
          this.creando = false;
        }
      });
    },
    getSoporte() {
      axios
        .get("/api/soporte-show/" + this.id)
        .then(res => {
          this.form = res.data;
          console.log(res.data);
        })
        .catch();
    }
  }
};
</script>
