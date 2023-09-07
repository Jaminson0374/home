<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesposicionesModel extends Model
{
    protected $table = 'deposiciones';
    use HasFactory;
    protected $guarded = [
        'datosbasicos_id',
        '_token',
        'planilla_id',
        'mes_ctrl',
        'ano',
    ];    
    
}
