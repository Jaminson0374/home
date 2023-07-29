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
        Schema::create('inv_articulos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia',25)->nullable();
            $table->string('descripcion');
            $table->string('abreviatura',15)->nullable(); 
             $table->foreignId('categoria_id')->references('id')->on('inv_categorias')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreignId('linea_id')->references('id')->on('inv_lineas')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('unimedidas_id')->references('id')->on('inv_unimedidas')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('proveedor_id')->references('id')->on('inv_proveedores')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('ccostos_id')->references('id')->on('inv_ccostos')->onDelete('cascade')->onUpdate('cascade'); 
            $table->double('stock_min')->nullable();
            $table->double('stock_max')->nullable();
            $table->double('inv_inicial')->nullable();
            $table->double('cant_entrada')->nullable();
            $table->double('cant_salidas')->nullable();
            $table->double('cant_ajustes')->nullable();
            $table->double('existencia')->nullable();
            $table->double('pcosto')->nullable();
            $table->integer('iva')->nullable();
            $table->double('pventa')->nullable();
            $table->double('fecha_ingreso')->nullable();
            $table->double('ult_fecha_compra')->nullable();
            $table->string('anulado',1)->nullable();
            
            $table->string('imagen')->nullable();            
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
        Schema::dropIfExists('inv_articulos');
    }
};
