<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemaDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema_dias', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('titulo');
            $table->string('oracion');
            $table->string('contenido');


            $table->integer('dia_adulto_id')->unsigned()->nullable();
            $table->foreign('dia_adulto_id')
                  ->references('id')
                  ->on('dia_adultos')
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
        Schema::dropIfExists('tema_dias');
    }
}
