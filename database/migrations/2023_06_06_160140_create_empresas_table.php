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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_razon_Social',200);
            $table->string('nombre_representante',100);
            $table->string('nit',25);
            $table->string('resolucion',200);
            $table->integer('consecutivo_inicio');
            $table->integer('consecutivo_final');
            $table->date('fecha_creacion');
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
        Schema::dropIfExists('empresas_create');
    }
};
