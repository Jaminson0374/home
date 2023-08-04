<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvLineasModel extends Model
{
    protected $table = 'inv_lineas';
    protected $guarded = [
        '_token',
        'lin_id',
        'accionBotonesLin',
        'presBtnNewLin'
    ];    
    use HasFactory;
}
