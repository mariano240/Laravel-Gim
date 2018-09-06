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
            $table->increments('historialrutina_id');
            $table->date('fecha');
        });

        Schema::table('historial_rutinas', function (Blueprint $table) {
            $table->foreign('rutina_id')->references('rutina_id')->on('rutinas');
            $table->foreign('historialentrenamiento_id')->references('historialentrenamiento_id')->on('historial_entrenamientos');
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
