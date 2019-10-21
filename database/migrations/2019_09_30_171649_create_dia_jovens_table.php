<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaJovensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_jovens', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('tipo_dia')->nullable();
            $table->string('dia')->nullable();
            $table->text('oracion_manana')->nullable();
            $table->text('reflexion')->nullable();
            $table->string('ejercicio')->nullable();
            $table->text('oracion_noche')->nullable();
            $table->string('nombre_oracional')->nullable();
            $table->string('fecha')->nullable();

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
        Schema::dropIfExists('dia_jovens');
    }
}
