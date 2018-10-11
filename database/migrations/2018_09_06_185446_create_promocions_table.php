<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionsTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('descripcion',255)->nullable();
            $table->date('fecha_adquisicion');
            $table->integer('descuento')->nullable();
            $table->integer('tiempo_extendido')->nullable();
            $table->unsignedInteger('membresia_id');
            $table->foreign('membresia_id')->references('id')->on('membresias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocions');
    }
}
