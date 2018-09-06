<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidads', function (Blueprint $table) {
            $table->increments('localidad_id');
            $table->string('nombre',65);
            $table->integer('cod_postal')->unique();

        });

        Schema::table('localidads', function (Blueprint $table) {
            $table->unsignedInteger('provincia_id');
            $table->foreign('provincia_id')->references('provincia_id')->on('provincias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidads');
    }
}
