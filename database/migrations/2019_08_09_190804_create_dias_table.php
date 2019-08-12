<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
            $table->Increments('id');
            $table->string("autor")->nullable();
            $table->string("fecha")->nullable();
            $table->string("mes")->nullable();
            $table->string("dia")->nullable();
            $table->string("tarea_del_dia")->nullable();
            $table->text("editorial")->nullable();
            $table->text("oracion_de_la_manana")->nullable();
            $table->text("tema_del_dia")->nullable();
            $table->text("oracion_de_la_noche")->nullable();
            $table->string("portada")->nullable();
            

            $table->integer('oracional_id')->unsigned()->nullable();
            $table->foreign('oracional_id')
                  ->references('id')
                  ->on('oracionals')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dias');
    }
}
