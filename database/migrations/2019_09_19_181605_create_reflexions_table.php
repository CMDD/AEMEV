<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReflexionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reflexions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('cita');
            $table->text('respuesta')->nullable();

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
        Schema::dropIfExists('reflexions');
    }
}
