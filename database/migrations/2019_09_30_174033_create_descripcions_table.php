<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripcions', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('titulo')->nullable();
            $table->string('color')->nullable();
            $table->text('contenido')->nullable();

            $table->integer('dia_puerta_id')->unsigned()->nullable();
            $table->foreign('dia_puerta_id')
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
        Schema::dropIfExists('descripcions');
    }
}
