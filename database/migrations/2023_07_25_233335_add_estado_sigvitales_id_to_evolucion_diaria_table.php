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
        Schema::table('evolucion_diaria', function (Blueprint $table) {
            $table->foreignId('estado_sigvitales_id')->references('id')->on('estado_sigvitales')->onDelete('cascade')->onUpdate('cascade')->after('recomendaciones');              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion_diaria', function (Blueprint $table) {
            
        });
    }
};
