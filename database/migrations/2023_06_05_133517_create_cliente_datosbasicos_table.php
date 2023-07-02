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
            $table->foreignId('id_tipodoc')->references('id')->on('tipo_documentos')->onDelete('cascade')->onUpdate('cascade');  
            $table->string('num_documento',25);
            $table->string('nombre', 40);
            $table->string('apellidos', 40);
            $table->foreignId('sexo_id')->references('id')->on('sexo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('grupoSanguineo_id')->references('id')->on('grp_sangre')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('nacionalidad_id')->references('id')->on('pais')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('departamento_id')->references('id')->on('departamentos')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade')->onUpdate('cascade');          
            $table->date('fecha_nacimiento');
            $table->string('edad',20)->nullable();
            $table->string('direccion_res', 100);  
            $table->string('telefonos_user', 60);
            $table->string('email_user', 50)->nullable();
            $table->date('fecha_creacion');
            $table->string('estado_user',4)->comment('OF: inactivo y ON:activo');
            $table->foreignId('tiposervicio_id')->references('id')->on('tiposervicios')->onDelete('cascade')->onUpdate('cascade');
            $table->text('diagnostico');
            $table->string('observacion')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('cliente_datosbasicos');
    }
};
