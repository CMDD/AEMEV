<template>
  <div>
    <section class="content-header">
      <h1>
        SUBIR DÍA - JÓVENES
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
        <form @submit.prevent="">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body">

                    <div class="form-group col-md-3">
                        <label for="exampleInputPassword1">Fecha</label>
                        <div class="input-group date">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control pull-right" id="datepicker" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group col-md-9 text-right">
                        <button class="btn btn-success">Guardar</button>
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-primary" @click="mostrarManana()">Oración de la mañana</button>
                        <button class="btn btn-primary" @click="mostrarFlexion()">Reflexión</button>
                        <button class="btn btn-primary" @click="mostrarNoche()">Oración de la noche</button>
                    </div>

                    <div class="form-group col-md-12" v-if="mananaVisible">
                        <textarea class="form-control" rows="10" placeholder="Contenido"></textarea>
                    </div>

                    <div class="form-group col-md-12" v-if="reflexionVisible">
                        <textarea class="form-control mb-2" rows="10" placeholder="Contenido"></textarea>
                        <input type="text" class="form-control" placeholder="Ejercicio">
                    </div>

                    <div class="form-group col-md-12" v-if="nocheVisible">
                        <textarea class="form-control" rows="10" placeholder="Contenido"></textarea>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </form>
      <!-- /.content -->
    </section>
  </div>
</template>

<script>

    export default {

        data(){
            return{
                mananaVisible:false,
                reflexionVisible:false,
                nocheVisible:false
            }
        },
        created(){

        },
        methods:{
            mostrarManana(){
                this.mananaVisible = true;
                this.reflexionVisible = false;
                this.nocheVisible = false
            },
            mostrarFlexion(){
                this.mananaVisible = false;
                this.reflexionVisible = true;
                this.nocheVisible = false
            },
            mostrarNoche(){
                this.mananaVisible = false;
                this.reflexionVisible = false;
                this.nocheVisible = true
            }
        }

    };
</script>
