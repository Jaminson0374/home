<?php

namespace App\Models\backend;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentoModell extends Model
{
    use HasFactory;

    protected $table = "tipo_documentos";
    protected $filable = ['descripcion'];


    // public function cliente(): BelongsTo
    // {
    //      return $this->belongsTo(Clientes::class, 'id');
    // }
  /* public function cliente(): HasMany
    {
        return $this->hasMany(Clientes::class, 'id_tipodoc','id');
     
    }    */

}
