<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolucionDiariaModel extends Model
{
    protected $table = "evolucion_diaria";
    protected $guarded = [
    'idEvolMedica',
    'accionBotones',
    'presBtnNewEvol',
    '_token'];
    use HasFactory;
}
