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
        Schema::table('admin_medic_user', function (Blueprint $table) {
            $table->foreignId('empleados_id')->references('id')->on('empleados')->onDelete('cascade')->after('indicaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_medic_user', function (Blueprint $table) {
            //
        });
    }
};
