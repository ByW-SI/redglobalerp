<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyMercanciasServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercancia_servicio', function (Blueprint $table) {
            $table->decimal('precio',8,2)->nullable();
            // $table->decimal('precio',8,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mercancia_servicio', function (Blueprint $table) {
            //
        });
    }
}
