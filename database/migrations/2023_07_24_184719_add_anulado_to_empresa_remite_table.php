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
        Schema::table('empresa_remite', function (Blueprint $table) {
            $table->string('observacion',150)->nullable()->after('contacto');
            $table->string('anulado',1)->nullable()->after('contacto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresa_remite', function (Blueprint $table) {
            //
        });
    }
};
