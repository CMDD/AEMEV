<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaPuertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_puertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion');
            $table->text('oracion_colecta')->nullable();
            $table->text('oracion')->nullable();

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
        Schema::dropIfExists('dia_puertas');
    }
}
