<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaProfesionalesModel extends Model
{
    protected $table = "visita_profesionales";
    use HasFactory;
    protected $guarded = [
    '_token',
    'horadbf',
    'idAsignaMedica',
    'horaTime',
    'minutoTime',
    'example2_length',];

}
