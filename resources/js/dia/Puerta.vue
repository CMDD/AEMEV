<template>
  <div>
    <section class="content-header">
      <h1>
        SUBIR DÍA - PUERTA
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
                        <label>Fecha</label>
                        <div class="input-group date mb-2">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control pull-right" id="datepicker" autocomplete="off">
                        </div>
                        <label>Descripción del día</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-9 text-right">
                        <button class="btn btn-success">Guardar</button>
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-primary" @click="mostrarColecta()">Oración colecta</button>
                        <button class="btn btn-primary" @click="mostrarLecturas()">Lecturas</button>
                        <button class="btn btn-primary" @click="mostrarSalmos()">Salmos</button>
                        <button class="btn btn-primary" @click="mostrarEvangelio()">Evangelio</button>
                        <button class="btn btn-primary" @click="mostrarReflexion()">Reflexión y Oración</button>
                    </div>

                    <div class="form-group col-md-12" v-if="colectaVisible">
                        <textarea class="form-control" rows="5" placeholder="Contenido"></textarea>
                    </div>

                    <div class="form-group col-md-12" v-if="lecturasVisible">
                        <div class="col-md-6">
                            <div class="box-module">
                                <input type="text" class="form-control mb-2" value="Primera lectura">
                                <input type="text" class="form-control mb-2" placeholder="Cita">
                                <textarea class="form-control" rows="10" placeholder="Contenido"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 nuevo">
                            <button class="btn btn-primary">Agregar Lectura</button>
                        </div>
                    </div>

                    <div class="form-group col-md-12" v-if="salmosVisible">
                        <div class="col-md-6">
                            <div class="box-module">
                                <input type="text" class="form-control mb-2" placeholder="Salmo">
                                <input type="text" class="form-control mb-2" placeholder="Al salmo respondemos:">
                                <ul class="versiculos">
                                    <li v-for="(input,index) in inputs">
                                        <input type="text" class="form-control" v-model="input.one" placeholder="Versículo">
                                        <span @click="deleteInput(index)"><i class="fa fa-trash"></i></span>
                                    </li>
                                </ul>
                                <button class="btn btn-primary ml-4" @click="addInput">Agregar</button>
                            </div>
                        </div>
                        <div class="col-md-12 nuevo">
                            <button class="btn btn-primary">Agregar Salmo</button>
                        </div>
                    </div>

                    <div class="form-group col-md-12" v-if="evangelioVisible">
                        <input type="text" class="form-control mb-2" placeholder="Lectura del evangelio según...">
                        <textarea class="form-control" rows="10" placeholder="Contenido"></textarea>

                    </div>

                    <div class="form-group col-md-12" v-if="reflexionVisible">
                        <input type="text" class="form-control mb-2" placeholder="Título">
                        <textarea class="form-control mb-2" rows="10" placeholder="Contenido"></textarea>
                        <textarea class="form-control" rows="5" placeholder="Oración"></textarea>
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
                colectaVisible:false,
                lecturasVisible:false,
                salmosVisible:false,
                evangelioVisible:false,
                reflexionVisible:false,
                inputs:[]
            }
        },
        created(){

        },
        methods:{
            addInput(){
              this.inputs.push({
                  one:''
              })
            },
            deleteInput(index){
              this.inputs.splice(index,1)
            },
            mostrarColecta(){
                this.colectaVisible = true;
                this.lecturasVisible = false;
                this.salmosVisible = false;
                this.evangelioVisible = false;
                this.reflexionVisible = false
            },
            mostrarLecturas(){
                this.colectaVisible = false;
                this.lecturasVisible = true;
                this.salmosVisible = false;
                this.evangelioVisible = false;
                this.reflexionVisible = false
            },
            mostrarSalmos(){
                this.colectaVisible = false;
                this.lecturasVisible = false;
                this.salmosVisible = true;
                this.evangelioVisible = false;
                this.reflexionVisible = false
            },
            mostrarEvangelio(){
                this.colectaVisible = false;
                this.lecturasVisible = false;
                this.salmosVisible = false;
                this.evangelioVisible = true;
                this.reflexionVisible = false
            },
            mostrarReflexion(){
                this.colectaVisible = false;
                this.lecturasVisible = false;
                this.salmosVisible = false;
                this.evangelioVisible = false;
                this.reflexionVisible = true
            }
        }

    };
</script>
