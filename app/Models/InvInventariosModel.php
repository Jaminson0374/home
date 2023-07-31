<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvInventariosModel extends Model
{
    protected $table = "inv_articulos";
    protected $guarded = [
        'accionBotones',
        'idCliente',
        'id',
        '_token',
        '_method',
        'softDeletes', 
        'timestamps',
        'presBtnNewArti',
        'idArtiMedica'      
    ];
    use HasFactory;
}
