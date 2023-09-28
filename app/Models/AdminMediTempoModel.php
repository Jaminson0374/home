<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMediTempoModel extends Model
{
    protected $table = "admin_med_tempo";
    use HasFactory;
    protected $guarded = ['id','_token', 'created_at','update_at'];
}
