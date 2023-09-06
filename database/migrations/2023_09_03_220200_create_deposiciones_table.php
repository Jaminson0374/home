<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('deposiciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datosbasicos_id')->references('id')->on('cliente_datosbasicos')->onDelete('cascade')->onUpdate('cascade');    
            $table->foreignId('empleado_id')->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');    
            $table->date('fecha');
            $table->integer('mes',2);
            $table->integer('ano',4);
            $table->string('dia', 2);
            $table->string('noche', 2);
            $table->integer('num_veces');
            $table->timestamps();
            
        });
    }

     public function down()
    {
        Schema::dropIfExists('deposiciones');
    }
};
