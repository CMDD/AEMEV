<template>
  <div>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Ixtus</small>
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
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{datos.suscripciones}}</h3>

              <p>Suscripciones</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#/suscripciones" class="small-box-footer">
              Mas información
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                {{datos.oracionales}}
                <!-- <sup style="font-size: 20px">%</sup> -->
              </h3>

              <p>Oracionales</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#/oracionales" class="small-box-footer">
              More info
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{datos.usuarios}}</h3>

              <p>Usuarios registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#/usuarios" class="small-box-footer">
              Mas información
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <!-- <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>8</h3>

              <p>Descargas de la app</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
              Mas información
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>-->
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
</template>
<script>
export default {
  data() {
    return {
      title: "HOLA",
      datos: {}
    };
  },
  created() {
    this.getDatos();
  },
  methods: {
    getDatos() {
      axios.get("dashboard/index").then(res => {
        this.datos = res.data;
        console.log(res.data);
      });
    }
  }
};
</script>