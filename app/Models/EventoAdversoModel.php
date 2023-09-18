<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoAdversoModel extends Model
{
    protected $table  = "reporte_evento";
    use HasFactory;
    protected $guarded = ['id','_token', 'created_at','updated_at'];
}
