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
        Schema::create('clinicas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150);
            $table->string('nit',30)->nullable();
            $table->string('direccion',200)->nullable();
            $table->string('telefono',80)->nullable();
            $table->string('representante',150)->nullable();
            $table->string('especialidad',150)->nullable();
            $table->string('observación',150)->nullable();    
            $table->string('anulado',1)->nullable();        
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
        Schema::dropIfExists('clinicas');
    }
};
