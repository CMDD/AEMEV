<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_kids', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('oracion_manana');
            $table->string('oracion_noche');
            $table->string('ejercicio');
            $table->string('tema_dia');
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
        Schema::dropIfExists('dia_kids');
    }
}
