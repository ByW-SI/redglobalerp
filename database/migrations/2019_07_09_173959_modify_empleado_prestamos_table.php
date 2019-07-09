<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyEmpleadoPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleado_prestamos', function (Blueprint $table) {
            $table->text('motivo')->nullable()->change();
            $table->string('numero_pagos')->change();
            $table->tinyInteger('interes');
            $table->string('adelanto_nomina')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado_prestamos', function (Blueprint $table) {
            $table->text('motivo')->change();
            $table->integer('numero_pagos')->change();
            $table->dropColumn('interes');
            $table->dropColumn('adelanto_nomina');
        });
    }
}
