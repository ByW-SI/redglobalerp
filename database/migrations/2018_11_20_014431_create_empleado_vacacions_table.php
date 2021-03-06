<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoVacacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_vacacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->date('fechainicio')->nullable();
            $table->date('fechafin')->nullable();
            $table->string('diasdisfrutar')->nullable();
            // $table->string('diasrestantes')->nullable();
            // $table->string('periodo1')->nullable();
            // $table->string('periodo2')->nullable();
            // $table->string('diastotal')->nullable();
            $table->timestampsTz();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_vacacions');
    }
}
