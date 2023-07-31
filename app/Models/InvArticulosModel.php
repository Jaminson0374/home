<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RequisicionMedicamentodsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvArticulosModel extends Model
{
    protected $table = 'inv_articulos';
    use HasFactory;
    protected $guarded = [
        'accionBotones',
        'idCliente',
        'id',
        '_token',
        '_method',
        'softDeletes', 
        'timestamps',
        'presBtnNewArti',
        'idArtiAnular'      
    ];
    //Relacion de uno a muchos
    public Function Requi_medicamentos () {
        return $this->hasMany('RequisicionMedicamentodsModel', 'id_articulos','id');
    }
}
