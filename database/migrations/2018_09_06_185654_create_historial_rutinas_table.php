<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialRutinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_rutinas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->unsignedInteger('rutina_id');
            $table->unsignedInteger('historialentrenamiento_id');
            $table->foreign('rutina_id')->references('id')->on('rutinas');
            $table->foreign('historialentrenamiento_id')->references('id')->on('historial_entrenamientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_rutinas');
    }
}
