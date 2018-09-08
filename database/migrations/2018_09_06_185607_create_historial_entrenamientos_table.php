<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialEntrenamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_entrenamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entrenamiento_id');
            $table->unsignedInteger('usuario_id');
            $table->foreign('entrenamiento_id')->references('id')->on('entrenamientos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_entrenamientos');
    }
}
