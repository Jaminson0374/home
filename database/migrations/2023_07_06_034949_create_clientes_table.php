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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datosbasicos_id')->references('id')->on('cliente_datosbasicos')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('tiposervicio_id')->references('id')->on('tiposervicios')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('empresa_remite_id')->references('id')->on('empresa_remite')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('tipo_afiliacion_id')->references('id')->on('tipo_afiliacion')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('rango_eps_id')->references('id')->on('rango_eps')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('cubiculos_id')->references('id')->on('cubiculos')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('medico_remite_id')->references('id')->on('medicos_externos')->onDelete('cascade')->onUpdate('cascade');            
            $table->foreignId('acompanantes_id')->references('id')->on('acompanantes')->onDelete('cascade')->onUpdate('cascade');            
            $table->date('fecha_ingreso')->nullable(); 
            $table->date('fecha_retiro')->nullable();
            $table->integer('num_dias')->nullable();
            $table->foreignId('empleado_id')->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');    
            $table->string('estado',4)->comment('OF: inactivo y ON:activo');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');  
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('clientes');
    }
};
