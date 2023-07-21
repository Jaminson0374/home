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
            $table->text('comentario_cita')->nullable()->comment('Acerca de la solicitud d ela cita')->after('fecha_cita');
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
