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
        Schema::create('inv_proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nit_cedula',20);
            $table->string('nombre',100);
            $table->string('direccion',150)->nullable();
            $table->string('telefono',50)->nullable();
            $table->string('representante',80)->nullable();
            $table->integer('cupo_credito')->nullable();
            $table->integer('plazo')->nullable();
            $table->string('anulado',1)->nullable()->nullable();
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
        Schema::dropIfExists('inv_proveedores');
    }
};
