<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaRemitenteModell extends Model
{
    protected $table ="empresa_remite";
    protected $guarded = [
        "eps_id",
        "id",
        "accionBotonesEps",
        "presBtnNewEps", 
        "_token",
        "_method",
        "softDeletes", 
        "timestamps"       
    ];
    use HasFactory;

}
