<template>
  <div>
    <section class="content-header">
      <h1>
        CREAR ORACIONALES
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
        <form method="POST" @submit.prevent="storeOracional">
          <div class="row">
            <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">INFORMACIÓN GENERAL</h3>
                </div>
                <div class="box-body">
                  <!-- <div class="form-group col-md-6">
                                <label>ESTADO</label>
                                <select class="form-control" name="estado">
                                    <option value="">Seleccione...</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Desactivo">Desactivo</option>
                                    
                                </select>
                  </div>-->
                  <div class="form-group col-md-6">
                    <label>ORACIONAL</label>
                    <select class="form-control" v-model="form.oracional" required>
                      <option value>Seleccione...</option>
                      <option value="Adultos">Adultos</option>
                      <option value="Jovenes">Jovénes</option>
                      <option value="Kids">Kids</option>
                      <option value="Puerta">Puerta</option>
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="exampleInputPassword1">Mes</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enero"
                      v-model="form.mes"
                      required
                    />
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputPassword1">Año</label>
                    <input
                      type="number"
                      class="form-control"
                      placeholder="2019"
                      v-model="form.ano"
                      required
                    />
                  </div>
                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Editorial</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Titulo"
                      v-model="form.editorial_titulo"
                      required
                    />
                    <textarea
                      class="form-control my-2"
                      placeholder="Contenido"
                      v-model="form.editorial_contenido"
                      rows="10"
                      required
                    ></textarea>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Autor"
                      v-model="form.editorial_autor"
                      required
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Informacion de portada</h3>
                </div>

                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Imagen de portada</label>
                  <input type="file" @change="getImage" ref="file" required />
                </div>

                <div class="box-footer">
                  <button v-if="!creando" type="submit" class="btn btn-default">
                    <span>Crear oracional</span>
                  </button>
                  <a href="#" v-else class="btn btn-default">Enviando...</a>
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
      form: {}
    };
  },
  methods: {
    getImage(event) {
      //Asignamos la imagen a  nuestra data
      this.form.portada = this.$refs.file.files[0];
    },
    storeOracional() {
      this.creando = true;
      //Creamos el formData
      var data = new FormData();
      //Añadimos la imagen seleccionada
      data.append("portada", this.form.portada);
      data.append("oracional", this.form.oracional);
      data.append("mes", this.form.mes);
      data.append("ano", this.form.ano);
      data.append("editorial_titulo", this.form.editorial_titulo);
      data.append("editorial_contenido", this.form.editorial_contenido);
      data.append("editorial_autor", this.form.editorial_autor);

      axios
        .post("api/crear-oracional", data, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(res => {
          console.log(res.data);
          if (res.data == 200) {
            Vue.swal(
              "Muy Bien Johnky",
              "Oracional creado correctamente",
              "success"
            );
            this.creando = false;
            this.form = {};
          }
          if (res.data == 500) {
            Vue.swal("Muy Mal Johnky", "Faltan datos", "error");
          }
        })
        .catch(error => {
          Vue.swal("Error", "Error del servidor", "error");
        });
    }
  }
};
</script>
