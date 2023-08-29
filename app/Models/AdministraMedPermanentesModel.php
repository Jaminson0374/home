<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministraMedPermanentesModel extends Model
{
    protected $table = "administra_med_permanentes";
    use HasFactory;
    protected $guarded = ['id','_token', 'created_at','update_at'];
}
