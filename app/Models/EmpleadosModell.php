<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadosModell extends Model
{
    protected $table = "empleados";
    protected $guarded = [
        'accionBotones',
        '_token',
        '_method',
        'softDeletes', 
		'accionBotones', 
		'presBtnNewEmp',
        'empleado_id',
        'timestamps',
        'idAdminMedica',
        '_method',
        'rutaTable',
    ];	    

    use HasFactory;
}
