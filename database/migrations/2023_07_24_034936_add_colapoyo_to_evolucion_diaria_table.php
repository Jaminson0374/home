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
        Schema::table('evolucion_diaria', function (Blueprint $table) {
            $table->text('evolucion_final')->nullable()->after('hora');
            $table->text('apreciacion')->nullable()->after('hora');
            $table->text('diag_signos_vit')->nullable()->after('hora');
            $table->text('objetivo')->nullable()->after('hora');
            $table->text('subjetivo')->nullable()->after('hora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucion_diaria', function (Blueprint $table) {
            //
        });
    }
};
