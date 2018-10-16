<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado',255);
            //$table->date('fecha_pago');
            $table->date('fecha_vencimiento');
            $table->string('nombre',65);
            $table->string('descripcion',255)->nullable();
            $table->float('costo',8,2);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('estado_membresia_id');
            $table->foreign('estado_membresia_id')->references('id')->on('estado_membresias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membresias');
    }
}
