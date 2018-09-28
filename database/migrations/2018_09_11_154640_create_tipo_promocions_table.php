<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoPromocionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_promocions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('estado',100);
            $table->string('descripcion',255)->nullable();
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
        Schema::dropIfExists('tipo_promocions');
    }
}
