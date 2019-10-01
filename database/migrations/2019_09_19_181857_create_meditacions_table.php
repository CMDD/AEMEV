<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeditacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meditacions', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('contenido');
            
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
        Schema::dropIfExists('meditacions');
    }
}
