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
        Schema::create('admin_medic_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datosbasicos_id')->references('id')->on('cliente_datosbasicos')->onDelete('cascade')->onUpdate('cascade');                                                   
            $table->foreignId('articulos_id')->references('id')->on('inv_articulos')->onDelete('cascade')->onUpdate('cascade');                                                   
            $table->string('nombre_tratamiento')->nullable(); 
            $table->integer('duracion_dias')->nullable();
            $table->string('indefinido',4)->nullable()->comment('ON=SI, OFF=NO, si el micamento hay que admnistrar indefinidamente');
            $table->float('dosis');
            $table->foreignId('unimedidas_id')->references('id')->on('inv_unimedidas')->onDelete('cascade')->onUpdate('cascade'); 
            $table->integer('pososlogia_t')->comment('cada cuanto hay que admin el medicaento');
            $table->string('pososlogia_h_d',10)->comment('si es en horas o días');
            $table->foreignId('tipoadmin_med_id')->references('id')->on('tipo_admin_med_user')->onDelete('cascade')->onUpdate('cascade');  
            $table->date('fecha_inicio')->comment('fecha en la que inicia el tratamiento');
            $table->date('fecha_finalizacion')->nullable()->comment('fecha en la que inicia el tratamiento');
            $table->time('hora_administracion')->nullable('hora en la que debe administrarse el medicamento');  
            $table->integer('suspendido')->nullable()->comment('ON = no suspendido, OFF = si suspendido');
            $table->string('motivo_suspen')->nullable();  
            $table->string('finalizar_admin',1)->nullable()->comment('S=si, N=no');         
            $table->string('indicaciones')->nullable();
            $table->foreignId('empleados_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->text('observacion')->nullable();
            $table->string('anulado',1)->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');  
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
        Schema::dropIfExists('admin_medic_user');
    }
};
