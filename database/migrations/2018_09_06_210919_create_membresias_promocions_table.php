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
            $table->increments('id');
            $table->date('fecha_adquisicion');
            $table->Integer('membresia_id');
            $table->Integer('promocion_id');
/*             $table->foreign('membresia_id')->references('id')->on('membresias');
            $table->foreign('promocion_id')->references('id')->on('promocions'); */
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
