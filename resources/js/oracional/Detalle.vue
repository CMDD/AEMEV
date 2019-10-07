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
        <div class="col-md-4">
          <img :src="'/'+ oracional.portada" class="img-responsive" width="50%" />
        </div>
        <div class="col-md-4">
          <form action>
            <div class="form-group">
              <label for="exampleInputPassword1">Datos</label>
              <input
                type="text"
                class="form-control"
                v-model="oracional.nombre"
                placeholder="Enero"
              />
            </div>
            <div class="form-group col-3">
              <label for="exampleInputPassword1">Datos</label>
              <input type="text" class="form-control" placeholder="Enero" />
            </div>
            <div class="form-group col-3">
              <label for="exampleInputPassword1">Datos</label>
              <input type="text" class="form-control" placeholder="Enero" />
            </div>

            <input type="button" class="btn btn-default" value="Actualizar" />
            <a
              class="btn btn-default"
              :href="'/#/' + oracional.nombre + '/' + oracional.id"
            >Agregar dia</a>
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
                <th>Id</th>
                <th>Oracional</th>
                <th>Fecha</th>
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
  },
  data() {
    return {
      id: this.$route.params.id,
      oracional: "",
      url: ""
    };
  },
  methods: {
    getOracional() {
      axios.get("/api/get-oracional/" + this.id).then(res => {
        this.oracional = res.data;
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
          columns: [
            { data: "id" },
            { data: "nombre_oracional" },
            { data: "fecha" },
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