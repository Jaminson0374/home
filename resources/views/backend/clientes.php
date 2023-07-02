Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->foreignId('datosbasico_id')->references('id')->on('cliente_datosbasicos')->onDelete('cascade')->onUpdate('cascade');            
    $table->foreignId('tiposervicio_id')->references('id')->on('tiposervicios')->onDelete('cascade')->onUpdate('cascade');            
    $table->foreignId('tipo_empresa_remite_id')->references('id')->on('tipo_empresa_remite')->onDelete('cascade')->onUpdate('cascade');            
    $table->foreignId('empresa_remite_id')->references('id')->on('empresa_remite')->onDelete('cascade')->onUpdate('cascade');            
    $table->foreignId('tipo_afiliacion_id')->references('id')->on('tipo_afiliacion')->onDelete('cascade')->onUpdate('cascade');            
    $table->foreignId('rango_eps_id')->references('id')->on('rango_eps')->onDelete('cascade')->onUpdate('cascade');            
    $table->foreignId('cubiculos_id')->references('id')->on('cubiculos')->onDelete('cascade')->onUpdate('cascade');            
    $table->text('habitos')->nullable();
    $table->text('gustos')->nullable();
    $table->text(acompanantes)->nullable();
    $table->foreignId('acompanantes_id')->references('id')->on('acompanantes')->onDelete('cascade')->onUpdate('cascade');            
    $table->date('fecha_ingreso')->nullable(); 
    $table->date('fecha_retiro')->nullable();
    $table->interger('num_dias')->nullable()
    $table->interger('costo_servicio')->nullable();  
    $table->foreignId('forma_pago_id')->references('id')->on('forma_pago')->onDelete('cascade')->onUpdate('cascade');  
    $table->integer('saldo')->nullable();
    $table->string('detalle_cuenta_banco',200)->nullable();
    $table->string('num_factura')->nuallable(); 
    $table->foreignId('empleado_id')->references('id')->on('empleado')->onDelete('cascade')->onUpdate('cascade');    
    $table->foreignId('user_id')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');  
    $table->timestamps(); 
});

         










