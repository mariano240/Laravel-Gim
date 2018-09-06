<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjerciciosRutinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicio_rutina', function (Blueprint $table) {
            $table->increments('ejerciciorutina_id');
            $table->integer('rutina_id');
            $table->integer('ejercicio_id');
            $table->integer('peso_carga')->nullable();
            $table->integer('cantidad_repeticiones')->nullable();
            $table->integer('cantidad_series')->nullable();
            $table->integer('tiempo_descanso')->nullable();
            $table->integer('tiempo_cardio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejercicio_rutina');
    }
}
