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
        Schema::create('camas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cubiculo_id')->references('id')->on('cubiculos')->onDelete('cascade')->onUpdate('cascade');              
            $table->integer('num_cama');
            $table->string('descripcion');
            $table->string('observacion',200)->nullable();
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
        Schema::dropIfExists('camas');
    }
};
