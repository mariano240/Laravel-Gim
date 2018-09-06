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
            $table->increments('musculo_id');
            $table->string('nombre',65);
            $table->string('imagen',255);
        });

        Schema::table('musculos', function (Blueprint $table) {
            $table->foreign('regioncorporal_id')->references('regioncorporal_id')->on('region_corporals');
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
