<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calle',65);
            $table->integer('altura')->nullable();
            $table->string('departamento',15)->nullable();
            $table->string('piso',15)->nullable();
            $table->unsignedInteger('localidad_id');
            $table->foreign('localidad_id')->references('id')->on('localidads');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccions');
    }
}
