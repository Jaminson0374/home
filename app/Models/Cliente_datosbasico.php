<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\backend\TipoDocumentoModell;
use App\Models\Clientes; 

class Cliente_datosbasico extends Model
{
    use HasFactory; 
    protected $table="cliente_datosbasicos";

    protected $guarded = [
        'accionBotones',
        'idCliente',
        'id',
        '_token',
        '_method',
        'softDeletes', 
        'timestamps'       
    ];
  
    public function tipodoc(): BelongsTo
    {
        
        return $this->belongsTo(TipoDocumentoModell::class, 'id_tipodoc');
     
    }   

    public function datosBasicos(): BelongsTo
    {
        return $this->belongsTo(Clientes::class, 'id');

    }     
}
