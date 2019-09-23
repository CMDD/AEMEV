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
            $table->dateTime("fecha")->nullable();
            $table->string("portada")->nullable();
            $table->text("oracion_manana")->nullable();
            $table->text("oracion_noche")->nullable();
            $table->string("tarea_dia")->nullable();
            $table->text("reflexion")->nullable();
            $table->text("ejercicio")->nullable();
            $table->text("tema_dia_k")->nullable();


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
