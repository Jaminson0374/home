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
        Schema::create('cliente_datosbasicos', function (Blueprint $table) {
            $table->id();
            $table->string('num_documento',25);
            $table->integer('sexo');
            $table->string('nombre', 40);
            $table->string('apellidos', 40);
            $table->integer('nacionalidad');
            $table->string('lugar_nacimiento');
            $table->date('fecha_nacimiento');
            $table->string('edad',20)->nullable();
            $table->string('grupo_sanguineo',20); 
            $table->string('direccion_res', 100);;  
            $table->string('telefonos_user', 60);;
            $table->string('email_user', 50)->nullable();
            $table->date('fecha_creacion');
            $table->string('estado_user',4)->comment('OF: inactivo y ON:activo');
            $table->string('observacion')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('id_tipodoc')->references('id')->on('tipo_documentos')->onDelete('cascade')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_datosbasicos');
    }
};
