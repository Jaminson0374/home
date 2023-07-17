<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposCitasModel extends Model
{
    protected $table = "tipos_cita";
    use HasFactory;
    /*protected $guarded = [ 
        '_method',
        '_token',
        'accionBotones',
        'btnSave',
        'id',
        'idClienteServicio',
        'tieneServicio',
        'accionBotones',
        'softDeletes', 
        'timestamps', 
        // 'updated_at',
        // 'created_at',
        // 'deleted_at'     
    ];    */
}
