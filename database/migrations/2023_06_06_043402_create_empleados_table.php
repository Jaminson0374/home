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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipodocumento_id')->references('id')->on('tipo_documentos')->onDelete('cascade')->onUpdate('cascade');  
            $table->string('num_documento',25);
            $table->string('nombre', 40);
            $table->string('apellidos', 40);
            $table->foreignId('sexo_id')->references('id')->on('sexo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('gruposanguineo_id')->references('id')->on('grp_sangre')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('nacionalidad_id')->references('id')->on('pais')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('departamento_id')->references('id')->on('departamentos')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade')->onUpdate('cascade');          
            $table->date('fecha_nacimiento');
            $table->string('edad',20)->nullable();
            $table->string('direccion_res', 100);  
            $table->string('telefonos', 60);
            $table->string('email', 50)->nullable();
            $table->foreignId('cargo_id')->references('id')->on('cargos')->onDelete('cascade')->onUpdate('cascade');            
            $table->string('nombre_familiar', 80);
            $table->string('parentezco_familiar', 30);
            $table->string('telefono_familiar', 30);
            $table->string('email_famliar', 50)->nullable();   
            $table->string('salario')->nullable();         
            $table->string('hoja_vida', 100)->nullable();
            $table->date('fecha_creacion');
            $table->string('estado',4)->comment('OF: inactivo y ON:activo');
            $table->text('funciones')->nullable();
            $table->foreignId('categoria_id')->references('id')->on('categoria_empleado')->onDelete('cascade')->onUpdate('cascade');            
            $table->text('observacion')->nullable();
            $table->string('anulado',1)->nullable();
            $table->softDeletes();
            $table->timestamps();
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
        Schema::dropIfExists('empleados');
    }
};
