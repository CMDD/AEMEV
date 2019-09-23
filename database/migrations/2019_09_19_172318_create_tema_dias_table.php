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
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('oracion');
            $table->string('contenido');
           

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
        Schema::dropIfExists('tema_dias');
    }
}