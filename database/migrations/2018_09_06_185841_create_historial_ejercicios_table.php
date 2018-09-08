<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialEjerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_ejercicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peso_carga')->nullable();
            $table->integer('cantidad_repeticiones')->nullable();
            $table->integer('cantidad_series')->nullable();
            $table->integer('tiempo_descanso')->nullable();
            $table->integer('tiempo_cardio')->nullable();
            $table->date('fecha');
            $table->unsignedInteger('ejercicio_id');
            $table->unsignedInteger('historialrutina_id');
            $table->foreign('ejercicio_id')->references('id')->on('ejercicios');
            $table->foreign('historialrutina_id')->references('id')->on('historial_rutinas');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_ejercicios');
    }
}
