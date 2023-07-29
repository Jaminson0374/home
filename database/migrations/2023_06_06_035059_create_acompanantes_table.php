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
        Schema::create('acompanantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipodocumento_id')->references('id')->on('tipo_documentos')->onDelete('cascade')->onUpdate('cascade');  
            $table->string('num_documento',25);
            $table->string('nombre', 40);
            $table->string('apellidos', 40);
            $table->foreignId('sexo_id')->references('id')->on('sexo')->onDelete('cascade')->onUpdate('cascade');
            $table->string('direccion_res', 100);  
            $table->string('telefonos', 60);
            $table->string('email', 50)->nullable();
            $table->string('parentezco', 30);
            $table->date('fecha_creacion');
            $table->text('observacion')->nullable();
            $table->string('anulado',1)->nullable();
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
        Schema::dropIfExists('acompanantes');
    }
};
