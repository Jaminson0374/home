<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcompanantesModel extends Model
{
    protected $table = "acompanantes";
    use HasFactory;
    protected $guarded = [
        '_token',
        'id',
        'idFamiliar',
        'newUpdate'
    ];	            
}
