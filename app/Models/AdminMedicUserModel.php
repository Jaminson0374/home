<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMedicUserModel extends Model
{
    protected $table = "admin_medic_user";
    protected $guarded = [
        'idAdminMedica',
        'accionBotones',
        'presBtnNewAdm',
        '_token'];    
    use HasFactory;
}
