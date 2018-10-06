<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipomembresiaTipopromocion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipomembresia_tipopromocion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_membresia_id');
            $table->unsignedInteger('tipo_promocion_id');
            $table->foreign('tipo_membresia_id')->references('id')->on('tipo_membresias');
            $table->foreign('tipo_promocion_id')->references('id')->on('tipo_promocions'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
