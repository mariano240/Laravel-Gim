<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrenamientosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrenamiento_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->integer('entrenamiento_id');
            $table->boolean('modificar');
            $table->date('fecha_asociasion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrenamiento_usuario');
    }
}
