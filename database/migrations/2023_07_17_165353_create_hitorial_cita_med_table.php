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
        Schema::create('hitorial_cita_med', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citamed_id')->references('id')->on('citas_medicas')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('datosbasicos_id')->references('id')->on('cliente_datosbasicos')->onDelete('cascade')->onUpdate('cascade'); 
            $table->date('fecha_cita');
            $table->time('hora_cita');
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hitorial_cita_med');
    }
};
