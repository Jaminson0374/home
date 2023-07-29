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
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',50)->nuallable();
            $table->timestamps();
            $table->foreignId('pais_id')->references('id')->on('pais')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('departamento_id')->references('id')->on('departamentos')->onDelete('cascade')->onUpdate('cascade');            
            $table->string('anulado',1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciudades');
    }
};
