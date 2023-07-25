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
        Schema::create('evolucion_diaria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datosbasicos_id')->references('id')->on('cliente_datosbasicos')->onDelete('cascade')->onUpdate('cascade');              
            // $table->foreignId('servicio_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');              
            $table->foreignId('empleado_id')->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');              
            $table->date('fecha');
            $table->time('hora');
            $table->text('evolucion_final')->nullable()->after('hora');
            $table->text('plan')->nullable()->after('hora');
            $table->text('apreciacion')->nullable()->after('hora');
            $table->text('diag_signos_vit')->nullable()->after('hora');
            $table->text('objetivo')->nullable()->after('hora');
            $table->text('subjetivo')->nullable()->after('hora');            
            $table->string('signosv_ta',20);
            $table->string('signosv_pc',20);
            $table->string('signosv_fr',20);
            $table->string('signosv_t',20);
            $table->string('signosv_p',20);
            $table->foreignId('evolucion_id')->references('id')->on('evolucion')->onDelete('cascade')->onUpdate('cascade');              
            $table->text('recomendaciones')->nullable(); 
            $table->text('obs_general')->nullable();  
            $table->string('anulado',1)->nullable();         
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
        Schema::dropIfExists('evolucion_diaria');
    }
};
