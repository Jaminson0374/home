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
            $table->integer('tipo_servicios');
            $table->string('nombre_acompanante', 60);
            $table->string('telefono_acompanante', 30);
            $table->string('email_acompanante', 50)->nullable();
            $table->integer('instituto_remitente');
            $table->string('medico_remitente', 60);
            $table->integer('tipo_afiliacion');
            $table->integer('grupo_rango_eps');
            $table->integer('cubiculo');
            $table->date('fecha_ingreso');
            $table->date('fecha_retiro')->nullable();
            $table->integer('num_dias')->nullable();
            $table->integer('cuidador_recibe');
            $table->string('num_factura', 20)->nullable();
            $table->date('fecha_factura')->nullable();
            $table->string('estado_servicio',4)->comment('OF: inactivo y ON:activo');
            $table->string('observacion')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreignId('cliente_id')->references('id')->on('cliente_datosbasicos')->onDelete('cascade')->onUpdate('cascade');            
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
