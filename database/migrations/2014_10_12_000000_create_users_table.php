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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_doc',3)->nullable();
            $table->string('num_doc', 30)->nullable();
            $table->string('name', 65);
            $table->string('tipo_sangre', 20)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono_contacto', 65)->nullable();
            $table->string('nombre_familiar', 80)->nullable();
            $table->string('parentezco_fami', 30)->nullable();
            $table->string('telefono_familiar', 30)->nullable();
            $table->integer('id_cargo')->nullable();
            $table->string('hoja_vida', 100)->nullable();
            $table->string('email')->unique();
            $table->string('role')->default('Customer');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
