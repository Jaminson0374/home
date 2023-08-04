<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargosModell extends Model
{   
    protected $table = 'cargos';
    protected $guarded = [
        '_token',
        'car_id',
        'accionBotonesCar',
        'presBtnNewCar'
    ];
    use HasFactory;
}
