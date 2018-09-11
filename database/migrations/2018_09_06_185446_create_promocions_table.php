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
            $table->string('estado',100);
            $table->string('descripccion',255)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('descuento')->nullable();
            $table->integer('tiempo_extendido')->nullable();
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
