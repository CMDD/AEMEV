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
                    <select class="form-control" v-model="form.oracional">
                      <option value>Seleccione...</option>
                      <option value="Adultos">Adultos</option>
                      <option value="Jovenes">Jovénes</option>
                      <option value="Kids">Kids</option>
                      <option value="Puerta">Puerta</option>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Editorial</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Titulo"
                      v-model="form.editorial_titulo"
                    />
                    <textarea
                      class="form-control my-2"
                      placeholder="Contenido"
                      v-model="form.editorial_contenido"
                      rows="10"
                    ></textarea>
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
                  <input type="file" @change="getImage" ref="file" />
                </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">
                    <span>Crear</span>
                  </button>
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
      form: {}
    };
  },
  methods: {
    getImage(event) {
      //Asignamos la imagen a  nuestra data
      this.form.portada = this.$refs.file.files[0];
    },
    storeOracional() {
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
        .post("/api/crear-oracional", data, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(res => {
          console.log(res.data);
        });
    }
  }
};
</script>
