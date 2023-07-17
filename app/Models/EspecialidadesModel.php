<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecialidadesModel extends Model
{
    protected $table = "especialidades";
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
