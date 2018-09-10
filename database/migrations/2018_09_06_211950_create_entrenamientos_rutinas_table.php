<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrenamientosRutinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrenamiento_rutina', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entrenamiento_id');
            $table->unsignedInteger('rutina_id');
            $table->string('dia',65);
            $table->foreign('rutina_id')->references('id')->on('rutinas');
            $table->foreign('entrenamiento_id')->references('id')->on('entrenamientos'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrenamiento_rutina');
    }
}
