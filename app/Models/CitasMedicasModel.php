<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitasMedicasModel extends Model
{
    protected $table = "citas_medicas";
    use HasFactory;
    protected $guarded = [
        'accionBotones',
        '_token',
        '_method',
        'softDeletes', 
		'accionBotones', 
		'presBtnNew',
        'timestamps'
    ];	

}
