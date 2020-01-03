<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesFtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones_ftl', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cotizacion_id');
            $table->string('tipo_unidad')->nullable();
            $table->string('es_sobredimensionado')->nullable();
            $table->string('unidad')->nullable();
            $table->string('capacidad_refrigerante')->nullable();
            $table->string('temperatura')->nullable();
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
        Schema::dropIfExists('cotizaciones_ftl');
    }
}
