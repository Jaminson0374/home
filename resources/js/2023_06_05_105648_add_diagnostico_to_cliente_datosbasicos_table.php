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
        Schema::table('cliente_datosbasicos', function (Blueprint $table) {
        
            // $table->string('reserva_si_no',2)->nullable()->after('diagnostico');
            $table->foreignId('tiposervicio_id')->references('id')->on('tiposervicios')->onDelete('cascade')->onUpdate('cascade');  

            /*$table->foreignId('sexo_id')->references('id')->on('sexo')->onDelete('cascade')->onUpdate('cascade')->after('num_documento');            
            $table->foreignId('nacionalidad_id')->references('id')->on('pais')->onDelete('cascade')->onUpdate('cascade')->after('apellidos');            
            $table->foreignId('departamento_id')->references('id')->on('depatamentos')->onDelete('cascade')->onUpdate('cascade')->after('nacionalidad_id');            
            $table->foreignId('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade')->onUpdate('cascade')->after('departamento_id');          
            $table->foreignId('grupoSanguineo_id')->references('id')->on('grp_sangre')->onDelete('cascade')->onUpdate('cascade')->after('edad');
             */          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente_datosbasicos', function (Blueprint $table) {
            //
        });
    }
};
