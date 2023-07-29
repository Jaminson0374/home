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
        Schema::create('inv_lineas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',10);
            $table->foreignId('categoria_id')->references('id')->on('inv_categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('descripcion',80); 
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
        Schema::dropIfExists('inv_lineas');
    }
};
