@extends('layouts.admin') @section('content')
<section class="content-header">
    <h1>
        SUBIR  ORACIONAL
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
    <!-- Main content -->
    <section class="content">
        <form
            method="POST"
            action="{{ url('crear-oracional') }}"
            enctype="multipart/form-data"
        >
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
                            <!-- <div class="form-group col-md-6">
                                <label>ESTADO</label>
                                <select class="form-control" name="estado">
                                    <option value="">Seleccione...</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Desactivo">Desactivo</option>
                                    
                                </select>
                            </div> -->
                            <div class="form-group col-md-6">
                                <label>ORACIONAL</label>
                                <select class="form-control" name="nombre">
                                    <option value="">Seleccione...</option>
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
                                    ,
                                    name="mes"
                                />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Año</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    placeholder="2019"
                                    ,
                                    name="ano"
                                />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputPassword1"
                                    >Descripción</label
                                >
                                <textarea
                                    name="descripcion"
                                    class="form-control"
                                    cols="30"
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
                            <label for="exampleInputPassword1"
                                >Imagen de portada</label
                            >
                            <input type="file" name="portada" />
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
@stop @push('scripts')
{{-- <script src="bower_components/ckeditor/ckeditor.js"></script> --}}
{{-- <script>
    $(function() {
        CKEDITOR.replace("editorial");
        CKEDITOR.replace("oracion_de_la_mañana");
        CKEDITOR.replace("tema_del_dia");
        CKEDITOR.replace("oracion_de_la_noche");
    });
</script> --}}
@endPush
