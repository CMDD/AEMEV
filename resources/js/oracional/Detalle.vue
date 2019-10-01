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
          <img :src="'/'+ oracional.portada" class="img-responsive" height="80" width="100" />
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
            <router-link to="/Puerta/1" class="btn btn-default">Agregar Dia</router-link>
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
                <th>Fecha</th>
                <th>Oracional</th>
                <th>Mes</th>
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
    $(document).ready(function() {
      $("#datatable-suscripciones").DataTable({
        serverSide: true,
        processing: true,
        ajax: "api/get-dias/2",
        columns: [
          { data: "fecha" },
          { data: "oracional_id" },
          { data: "id" },
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

    this.getOracional();
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
      ],
      id: this.$route.params.id,
      oracional: ""
    };
  },
  methods: {
    getOracional() {
      axios.get("/api/get-oracional/" + this.id).then(res => {
        this.oracional = res.data;
      });
    }
  }
};
</script>