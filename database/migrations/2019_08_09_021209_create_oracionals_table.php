<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOracionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oracionals', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('estado')->nullable();
            $table->string('nombre');
            $table->string('mes')->nullable();
            $table->string('ano')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('portada')->nullable();
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
        Schema::dropIfExists('oracionals');
    }
}
