<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',65);
            $table->string('imagen',255);
            $table->unsignedInteger('regioncorporal_id');
            $table->foreign('regioncorporal_id')->references('id')->on('region_corporals');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musculos');
    }
}
