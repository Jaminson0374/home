<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignosVitalesModel extends Model
{
    protected $table = 'signos_vitales';
    use HasFactory;
    protected $guarded = [
        'idSvMedica',
        'accionBotones',
        'presBtnNewEvol',
        '_token',
        'presBtnNewSv',
    ];
}
