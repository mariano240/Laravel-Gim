<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresiasPromocionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membresia_promocion', function (Blueprint $table) {
            $table->increments('membresiapromocion_id');
            $table->integer('membresia_id');
            $table->integer('promocion_id');
            $table->date('fecha_adquisicion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membresia_promocion');
    }
}
