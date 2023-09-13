<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtrlGlucometriaModel extends Model
{
    protected $table = "ctrl_glucometria";
    use HasFactory;
    protected $guarded = [
        'accionBotones',
        'idCliente',
        'id',
        '_token',
        'horadbf',
        'idAsignaMedica'
    ];    
}
