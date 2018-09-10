<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjerciciosMusculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicio_musculo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ejercicio_id');
            $table->unsignedInteger('musculo_id');
            $table->foreign('ejercicio_id')->references('id')->on('ejercicios');
            $table->foreign('musculo_id')->references('id')->on('musculos'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejercicio_musculo');
    }
}
