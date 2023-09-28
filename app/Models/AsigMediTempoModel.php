<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsigMediTempoModel extends Model
{
    protected $table ="asig_med_tempo";
    use HasFactory;
    protected $guarded = [
        'accionBotones',
        '_token',
		'presBtnNewAdm',
        'idAsignaMedica',
        'newUpdate',
        'id',
    ];	            
}
