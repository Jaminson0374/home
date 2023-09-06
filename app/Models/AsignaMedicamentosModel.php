<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignaMedicamentosModel extends Model
{
    protected $table = "asigna_medicamentos";
    use HasFactory;
    protected $guarded = [
        'accionBotones',
        '_token',
        '_method',
        'softDeletes', 
		'accionBotones', 
		'presBtnNewAdm',
        'empleado_id',
        'idAsignaMedica',
        '_method',
        'rutaTable',
        'id',
        'ampmTime',
        'horaTime',
        'minutoTime',
    ];	        
}
