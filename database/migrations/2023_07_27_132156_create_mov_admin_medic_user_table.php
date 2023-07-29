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
        Schema::create('mov_admin_medic_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_medicamento_id')->references('id')->on('admin_medic_user')->onDelete('cascade')->onUpdate('cascade');                                                               
            $table->date('fecha_admin');
            $table->date('hora_admin');
            $table->date('dosis_admin');
            $table->foreignId('reacionmedica_id')->references('id')->on('reaccion_medicamento')->onDelete('cascade')->onUpdate('cascade');                                                               
            $table->text('oservacion');
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
        Schema::dropIfExists('mov_admin_medic_user');
    }
};
