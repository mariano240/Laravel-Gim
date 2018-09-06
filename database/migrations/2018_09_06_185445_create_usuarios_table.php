<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('usuario_id');
            $table->string('tipo_usuario',255);
            $table->string('nombre',65);
            $table->string('apellido',65);
            $table->integer('dni');
            $table->string('email',255);
            $table->string('telefono',255);
            $table->string('contrasena',255);
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('membresia_id')->references('membresia_id')->on('membresias');
            $table->foreign('direccion_id')->references('direccion_id')->on('direccions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
