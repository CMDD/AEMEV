@extends('layouts.admin')
@section('content')
<section class="content-header">
<h1>
SUBIR DÍA AL ORACIONAL
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
<!-- Main content -->
<section class="content container-fluid">
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{url('actualizar-dia',$dia->id)}}">
        {!!csrf_field()!!}
        <div class="row">

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">
                INFORMACIÓN GENERAL
                </h3>
                </div>
                <div class="box-body">
                    <div class="form-group col-md-6">
                    <label>ORACIONAL</label>
                    <select class="form-control" name="oracional">
                    <option value="{{$dia->oracional_id}}">{{$dia->oracional_id}}</option>
                    @foreach($oracionales as $oracional)
                    <option value="{{$oracional->id}}">{{$oracional->nombre}} {{$oracional->ano}}</option>
                    @endforeach
                    </select>
                    </div>

                    <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Fecha oracional</label>
                    <input type="text" class="form-control" value="{{$dia->fecha}}" name="fecha">
                    </div>
                    <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Tarea del día</label>
                    <input type="text" class="form-control" value="{{$dia->tarea_del_dia}}" name="tarea_del_dia">
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
                    <label for="exampleInputPassword1"
                        >Imagen de portada</label
                    >
                    
                    <img src="" alt="">
                </div>

                
            

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">
                <span >Actualizar</span>
                </button>
            </div>
            
            </div>
        </div>
        <div class="col-md-8">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Editorial</a></li>
        <li><a href="#tab_2" data-toggle="tab">Oración de la mañana</a></li>
        <li><a href="#tab_3" data-toggle="tab">Tema del día</a></li>
        <li><a href="#tab_4" data-toggle="tab">Oración de la noche</a></li>


        </li>
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
            <div class="box box-info">
            <div class="box-header">
            <h3 class="box-title">Editorial

            </h3>
            </div>
            <div class="box-body pad">                                                  
            <textarea id="editorial"  name="editorial" rows="10" cols="80">
            {!!$dia->editorial!!}
            </textarea>
            </div>
            </div>
            </div>

            <div class="tab-pane" id="tab_2">
            <div class="box box-info">
            <div class="box-header">
            <h3 class="box-title">Oracion de la mañana
            </h3>
            </div>
            <div class="box-body pad">
                <textarea id="oracion_de_la_mañana"  name="oracion_de_la_manana" rows="10" cols="80">
                {!!$dia->oracion_de_la_manana!!}
                </textarea>
            </div>
            </div>
            </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
            <div class="box box-info">
                <div class="box-header">
                <h3 class="box-title">Tema del día
                </h3>
                </div>
                <div class="box-body pad">
                    <textarea id="tema_del_dia" value=""  name="tema_del_dia" rows="10" cols="80">
                    {!!$dia->tema_del_dia!!}
                    </textarea>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_4">
                <div class="box box-info">
                        <div class="box-header">
                        <h3 class="box-title">Oración de la noche
                        </h3>
                        </div>
                        <div class="box-body pad">
                            <textarea id="oracion_de_la_noche"  name="oracion_de_la_noche" rows="10" cols="80">
                            {!!$dia->oracion_de_la_noche!!}
                            </textarea>
                        </div>
                    </div>
        </div>
        <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
        </div>

        </div>
        </form>
    </section>
    <!-- /.content -->
</section>
@stop

@push('scripts')
<!-- <script src="/bower_components/ckeditor/ckeditor.js"></script> -->
<script>
$(function () {

CKEDITOR.replace('editorial')
CKEDITOR.replace('oracion_de_la_mañana')
CKEDITOR.replace('tema_del_dia')
CKEDITOR.replace('oracion_de_la_noche')

})
</script>
@endPush