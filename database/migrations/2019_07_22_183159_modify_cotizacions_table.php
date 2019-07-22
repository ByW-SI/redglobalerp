<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizacions', function (Blueprint $table) {
            $table->text('line1_origen');
            $table->string('cp_origen');
            $table->text('line1_destino');
            $table->string('cp_destino');
            $table->string('tipo_servicio');
            $table->date('eta');
            $table->boolean('despacho_aduanal');
            $table->string('es_estibable');
            $table->string('peligroso_clase')->nullable();
            $table->string('peligroso_nu')->nullable();
            $table->decimal('peso_total_cot');
            $table->decimal('volumen_total_cot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotizacions', function (Blueprint $table) {
            $table->dropColumn('line1_origen');
            $table->dropColumn('cp_origen');
            $table->dropColumn('line1_destino');
            $table->dropColumn('cp_destino');
            $table->dropColumn('tipo_servicio');
            $table->dropColumn('eta');
            $table->dropColumn('despacho_aduanal');
            $table->dropColumn('es_estibable');
            $table->dropColumn('peligroso_clase');
            $table->dropColumn('peligroso_nu');
            $table->dropColumn('peso_total_cot');
            $table->dropColumn('volumen_total_cot');
        });
    }
}
