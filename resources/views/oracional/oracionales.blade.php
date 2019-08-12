@extends('layouts.admin') @section('content')
<section class="content-header">
    <h1>
        ORACIONALES
        <small>El Man Está Vivo</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#"> <i class="fa fa-dashboard"></i> Oracionales </a>
        </li>
        <li class="active">Aqui</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
<div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Estado</th>
                  <th>Oracional</th>
                  <th>Mes</th>
                  <th>Año</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($oracionales as $oracional)
                <tr>
                  <td>{{$oracional->estado}}</td>
                  <td>{{$oracional->nombre}}</td>
                  <td>{{$oracional->mes}}</td>
                  <td>{{$oracional->ano}}</td>
                  <td>
                    <a href="/detalle-oracional/{{$oracional->id}}">
                    <button class="btn btn-default btn-custom">Editar</button>
                   </a>
                      
                      <a href="/ver-dias/{{$oracional->id}}">
                      <button class="btn btn-default  btn-custom">Ver días</button>
                      </a>
                      
                  </td>
                </tr>
                @endforeach
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    
</section>
@stop @push('scripts')
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
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
    })
  })
</script>
@endPush

@push('styles')
<style>
.btn-custom{
 
}
</style>
<!-- DataTables -->
<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush
