<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos_externos', function (Blueprint $table) {
            $table->id();
            $table->string('doc_identidad',20); 
            $table->string('nombre',80);
            $table->string('organizacion',100)->nullable()->comment('organizacion a la que pertenece');
            $table->string('direccion_residencial',100)->nullable();
            $table->string('direccion_laboral',100)->nullable();
            $table->foreignId('sexo_id')->references('id')->on('sexo')->onDelete('cascade')->onUpdate('cascade');
            $table->string('telefono',60)->nullable();
            $table->string('especialidad',150)->nullable(); 
            $table->string('tprofesional',80)->nullable();            
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
        Schema::dropIfExists('medicos_externos');
    }
};
