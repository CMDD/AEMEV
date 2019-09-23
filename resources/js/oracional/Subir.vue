<template>
  <div>
    <section class="content-header">
      <h1>
        CREAR ORACIONAL
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
        <form method="POST" enctype="multipart/form-data">
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
                    <select class="form-control" name="nombre">
                      <option value>Seleccione...</option>
                      <option value="Adultos">Adultos</option>
                      <option value="Jovenes">Jovénes</option>
                      <option value="Kids">Kids</option>
                      <option value="Puerta">Puerta</option>
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="exampleInputPassword1">Mes</label>
                    <input type="text" class="form-control" placeholder="Enero" name="mes" />
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputPassword1">Año</label>
                    <input type="number" class="form-control" placeholder="2019" name="ano" />
                  </div>
                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Descripción</label>
                    <textarea name="descripcion" class="form-control" cols="30" rows="10"></textarea>
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
  </div>
</template>

<script>
export default {};
</script>