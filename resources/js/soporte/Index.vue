<template>
  <div>
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Soporte
        <small>El Man Está Vivo</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="#/">
            <i class="fa fa-dashboard"></i> Dashboard
          </a>
        </li>
        <li class="active">Aqui</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Listado</h3>
          <button @click="getSoporte('Abierto')" class="btn btn-default">Abiertos</button>
          <button @click="getSoporte('Cerrado')" class="btn btn-default">Cerrados</button>
          <button @click="getSoporte('En proceso')" class="btn btn-default">En proceso</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="datatable-suscripciones" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Estado</th>
                <th style="width:10%">Fecha</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Comentario</th>
                <th style="width:10%">Acción</th>
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
import moment from "moment";
export default {
  name: "app",
  created() {
    this.renderDatatable("Abierto");
  },
  data() {
    return {
      perPage: ["10", "25", "50"],
      columns: [
        {
          label: "ID",
          name: "id",
          filterable: true
        }
      ]
    };
  },
  methods: {
    getSoporte(tipo) {
      $("#datatable-suscripciones")
        .dataTable()
        .fnDestroy();
      this.renderDatatable(tipo);
    },
    renderDatatable(tipo) {
      let url = "/api/get-soporte/" + tipo;
      $(document).ready(function() {
        $("#datatable-suscripciones").DataTable({
          serverSide: true,
          processing: true,
          ajax: url,
          columns: [
            { data: "estado" },
            {
              render: function(data, type, row) {
                let fecha = moment(row["created_at"]).format("DD-MM-YY");
                return fecha;
              }
            },
            { data: "name" },
            { data: "usuario" },
            { data: "comentario" },
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