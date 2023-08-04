<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvCategoriasModel extends Model
{
    protected $table = 'inv_categorias';
    protected $guarded = [
        '_token',
        'cat_id',
        'accionBotonesCat',
        'presBtnNewCat'
    ];
    use HasFactory;
}
