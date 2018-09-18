<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
          //  $table->string('name');
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('tipo_usuario',255);
            $table->string('nombre_usuario',65)->unique();
            $table->string('nombre',65);
            $table->string('apellido',65);
            $table->integer('dni')->unique();

            $table->string('telefono',255);
            $table->date('fecha_alta');
            $table->string('estado',255)->nullable();
            
            $table->unsignedInteger('direccion_id');
           
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
        Schema::dropIfExists('users');
    }
}
