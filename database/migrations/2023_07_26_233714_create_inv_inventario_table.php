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
        Schema::create('inv_inventario', function (Blueprint $table) {
            $table->id();
            $table->integer('consecutivo')->nullable();
            $table->foreignId('articulo_id')->references('id')->on('inv_categorias')->onDelete('cascade')->onUpdate('cascade');                                       
            $table->double('cant_entrada')->nullable();
            $table->double('cant_salida')->nullable();
            $table->date('fecha_ing_sal')->nullable();
            $table->string('documento_ing_sal',20)->nullable();            
            $table->foreignId('documentos_id')->references('id')->on('inv_documentos')->onDelete('cascade')->onUpdate('cascade');                                       
            $table->foreignId('conceptos_id')->references('id')->on('inv_conceptos')->onDelete('cascade')->onUpdate('cascade');                                                   
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
        Schema::dropIfExists('inv_inventario');
    }
};
