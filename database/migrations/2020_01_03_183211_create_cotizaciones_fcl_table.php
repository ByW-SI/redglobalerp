<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesFclTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones_fcl', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cotizacion_id');
            $table->string('contenedor_maritimo');
            $table->timestamps();

            $table->foreign('cotizacion_id')->references('id')->on('cotizacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones_fcl');
    }
}
