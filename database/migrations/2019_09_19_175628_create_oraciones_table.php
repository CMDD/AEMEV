<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oraciones', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('titulo');
            $table->text('contenido');
            $table->string('autor');


            $table->integer('diapuerta_id')->unsigned()->nullable();
            $table->foreign('diapuerta_id')
                  ->references('id')
                  ->on('dia_puertas')
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
        Schema::dropIfExists('oraciones');
    }
}
