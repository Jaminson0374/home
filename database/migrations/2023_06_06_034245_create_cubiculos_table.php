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
        Schema::create('cubiculos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',20);
            $table->string('descripcion',50);
            $table->string('pasillo',50);
            $table->string('seccion',50);
            $table->string('observacion',50);
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
        Schema::dropIfExists('cubiculos');
    }
};
