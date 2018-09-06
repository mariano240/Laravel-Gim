<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('pago_id');
            $table->integer('monto');
            $table->string('forma_pago',255);
            $table->date('fecha');
            
        });

        Schema::table('pagos', function (Blueprint $table) {
            $table->unsignedInteger('membresia_id');
            $table->foreign('membresia_id')->references('membresia_id')->on('membresias');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
