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
        Schema::create('empresa_remite', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',150)->nullable();
            $table->timestamps();
            $table->string('contacto',150)->nullable()->after('descripcion');
            $table->string('telefono',60)->nullable()->after('descripcion');
            $table->string('direccion',200)->nullable()->after('descripcion');  
            $table->foreignId('tipo_empresa_id')->references('id')->on('tipo_empresa_remite')->onDelete('cascade')->onUpdate('cascade'); 
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
        Schema::dropIfExists('empresa_remite');
    }
};
