<template>
  <div>
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Detalle
        <small>El Man Está Vivo</small>
      </h1>-->
      <div v-if="oracional" class="row">
        <div class="col-md-2">
          <img :src="'/'+ oracional.portada" class="img-responsive" width="100%" />
          <br />
          <input type="button" class="btn btn-default" value="Cambiar Imagen" width="100%" />
        </div>
        <div class="col-md-4">
          <form @submit.prevent="updateOracional">
            <div class="form-group">
              <label for="exampleInputPassword1">Nombre</label>
              <input
                type="text"
                class="form-control"
                v-model="oracional.nombre"
                placeholder="Enero"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Mes</label>
              <input type="text" class="form-control" v-model="oracional.mes" />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Año</label>
              <input type="text" class="form-control" v-model="oracional.ano" />
            </div>
            <div class="form-group">
              <input type="checkbox" v-model="publicar.estado" @click="publicarOracional()" /> Publicar oracional
            </div>

            <input
              v-if="!actualizandoOracional"
              type="submit"
              class="btn btn-default"
              value="Actualizar oracional"
            />
            <a v-else href="#" class="btn btn-default">Actualizando...</a>
            <a
              class="btn btn-default"
              :href="'/inicio#/' + oracional.nombre + '/' + oracional.id"
            >Agregar dia</a>
          </form>
        </div>
        <div class="col-md-4 borderDiv">
          <form @submit.prevent="updateEditorial">
            <div class="form-group">
              <label for="exampleInputPassword1">Titulo editorial</label>
              <input
                type="text"
                class="form-control"
                v-model="editorial.titulo"
                placeholder="Enero"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contenido</label>
              <textarea
                name
                id
                cols="40"
                rows="6"
                v-model="editorial.contenido"
                class="form-control"
              ></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Autor</label>
              <input type="text" class="form-control" v-model="editorial.autor" />
            </div>
            <input
              type="submit"
              class="btn btn-default"
              v-if="!actualizarEditorial"
              value="Actualizar editorial"
            />
            <a href class="btn btn-default" v-else>Actualizando...</a>
          </form>
        </div>
      </div>
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> Dashboard
          </a>
        </li>
        <li class="active">Aqui</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Días</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="datatable-suscripciones" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Oracional</th>
                <th>Dia</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>
</template>

<script>
import datatable from "datatables";
export default {
  name: "Detalle",
  created() {
    this.getOracional();
    this.getEditorial();
  },
  data() {
    return {
      actualizandoOracional: false,
      actualizarEditorial: false,
      publicar: {
        id: this.$route.params.id,
        estado: null
      },
      id: this.$route.params.id,
      oracional: "",
      editorial: {},
      url: ""
    };
  },
  methods: {
    publicarOracional() {
      this.publicar.estado = !this.publicar.estado;
      axios.post("/oracional-publicar", this.publicar).then(res => {
        if (res.data.code === 200) {
          Vue.swal("Publicado", "Oracional publicado correctamente", "success");
        } else {
          Vue.swal(
            "Despublicado",
            "Oracional despublicado correctamente",
            "success"
          );
        }
      });
    },
    getEditorial() {
      axios.get("/editorial-oracional/" + this.id).then(res => {
        this.editorial = res.data;
      });
    },
    updateEditorial() {
      this.actualizarEditorial = true;
      axios
        .post("/update-editorial", this.editorial)
        .then(res => {
          Vue.swal(
            "Actualizado!!!",
            "Editorial actualizado correctamente",
            "success"
          );
          this.actualizarEditorial = false;
        })
        .catch(error => {
          console.log(error);
        });
    },
    updateOracional() {
      this.actualizandoOracional = true;
      axios
        .post("/actualizar-oracional", this.oracional)
        .then(res => {
          Vue.swal(
            "Actualizado!!!",
            "Oracional actualizado correctamente",
            "success"
          );
          this.actualizandoOracional = false;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getOracional() {
      axios.get("/api/get-oracional/" + this.id).then(res => {
        this.oracional = res.data;
        if (res.data.estado == "Activo") {
          this.publicar.estado = true;
        } else {
          this.publicar.estado = false;
        }

        this.url = "/api/get-dias-" + this.oracional.nombre + "/" + this.id;
        this.getDias(this.url);
      });
    },
    getDias(url) {
      $(document).ready(function() {
        $("#datatable-suscripciones").DataTable({
          serverSide: true,
          processing: true,
          ajax: url,
          order: [[2, "ASC"]],
          columns: [
            { data: "nombre_oracional" },

            {
              data: function(data, type, row) {
                return data.tipo_dia + " " + data.dia;
              }
            },
            { data: "btn" }
          ],
          language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
              "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty:
              "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
              sFirst: "Primero",
              sLast: "Último",
              sNext: "Siguiente",
              sPrevious: "Anterior"
            },
            oAria: {
              sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
              sSortDescending:
                ": Activar para ordenar la columna de manera descendente"
            }
          }
        });
      });
    }
  }
};
</script>

<style>
.borderDiv {
  border-left: 1px solid #ccc;
}
</style>