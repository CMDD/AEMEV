<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('titulo');
            $table->string('cita');
            $table->text('contenido')->nullable();

    
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
        Schema::dropIfExists('lecturas');
    }
}
