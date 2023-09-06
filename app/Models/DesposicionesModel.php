<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesposicionesModel extends Model
{
    protected $table = 'deposicion_planilla';
    use HasFactory;
    protected $guarded = [
        'accionBotones',
        'idCliente',
        'id',
        '_token',
        '_method',
        'softDeletes', 
        'timestamps', 
        'presBtnNew',
        '_method',  
        'nDdocumento',    
    ];    
    
}
