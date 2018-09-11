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
            $table->increments('id');
            $table->string('tipo_usuario',255);
            $table->string('nombre_usuario',65)->unique();
            $table->string('nombre',65);
            $table->string('apellido',65);
            $table->integer('dni')->unique();
            $table->string('email',100)->unique();
            $table->string('telefono',255);
            $table->string('contrasena',255);
            $table->date('fecha_alta');
            $table->string('estado',255)->nullable();
            $table->unsignedInteger('membresia_id');
            $table->unsignedInteger('direccion_id');
            $table->foreign('membresia_id')->references('id')->on('membresias');
            $table->foreign('direccion_id')->references('id')->on('direccions');
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
