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
        Schema::create('requisicion_medicamento', function (Blueprint $table) {
            $table->id();
            $table->integer('consecutivo');
            $table->foreignId('datosbasicos_id')->references('id')->on('cliente_datosbasicos')->onDelete('cascade')->onUpdate('cascade');            
            $table->date('fecha_requisicion');
            $table->foreignId('articulos_id')->references('id')->on('inv_articulos')->onDelete('cascade')->onUpdate('cascade');
            $table->double('cantidad');
            $table->foreignId('unimedidas_id')->references('id')->on('inv_unimedidas')->onDelete('cascade')->onUpdate('cascade'); 
            $table->date('existencia_hasta')->nullable();
            $table->date('fecha_vencimiento')->nullable() ;
            $table->foreignId('empleados_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->string('lote',30)->nullable();
            $table->string('remision',30)->nullable();
            $table->foreignId('consecutivo_id')->references('id')->on('consecutivos')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('requisicion_medicamento');
    }
};
