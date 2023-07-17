<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas_medicas', function (Blueprint $table) {
            $table->date('fecha_pedido_cita')->comment('fecha en la que pidió la cita medica')->after('riesgo_cita');
            $table->date('fecha_reprograma_cita')->comment('nueva fecha de para la cita medica')->after('fecha_cita');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citas_medicas', function (Blueprint $table) {
            //
        });
    }
};
