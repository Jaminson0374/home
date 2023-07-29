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
        Schema::create('citas_medicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinica_id')->references('id')->on('clinicas')->onDelete('cascade')->onUpdate('cascade');             //
            $table->foreignId('datosbasicos_id')->references('id')->on('cliente_datosbasicos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tiposcita_id')->references('id')->on('tipos_cita')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('especialidades_id')->references('id')->on('especialidades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tipoatencion_id')->references('id')->on('tipo_atencion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('medico_remite_id')->references('id')->on('medicos_externos')->onDelete('cascade')->onUpdate('cascade'); 
            $table->integer('riesgo_cita')->comment('bajo, medio, alto ');
            $table->date('fecha_pedido_cita')->comment('fecha en la que pidió la cita medica');
            $table->date('fecha_cita')->comment('fecha que se realizará la cita medica');
            $table->time('hora_cita')->nullable()->comment('hora que tiene programada la cita');
            $table->time('hora_ingreso_cita')->nullable()->comment('Hora real en la que entró a la cita');
            $table->time('hora_salida_cita')->nullable();
            $table->integer('duracion_cita')->nullable();
            $table->text('Procedimiento_realizado')->nullable();
            $table->text('comentario_cita')->nullable()->comment('acerca de la solicitud de la cita');
            $table->date('proxima_cita')->nullable();
            $table->text('formulacion')->nullable()->comment('Descripcion de la formula');
            $table->string('archivo_cita')->nullable()->comment('puede ser una imagen o Pdf');
            $table->text('recomendaciones')->nullable();
            $table->integer('cumplio_cita')->nullable()->comment('si=1, No=2 y motivo');
            $table->text('motivo_nocumplimiento')->nullable()->comment('se activa si no cumplió la cita');
            $table->integer('total_citas')->nullable();
            $table->integer('citas_pendientes')->nullable();
            $table->integer('cita_cercana')->nullable();
            $table->integer('estado_citas');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');  
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
        Schema::dropIfExists('citas_medicas');
    }
};
