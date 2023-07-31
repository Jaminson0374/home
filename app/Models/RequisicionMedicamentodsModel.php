<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvArticulosModel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RequisicionMedicamentodsModel extends Model
{
    use HasFactory;
    protected $table = 'requisicion_medicamento';
    protected $guarded = [
        'idRequiMedica',
        'accionBotones',
        'presBtnNewReq',
          '_token'];    

    //Relacion de uno a muchos a la inversa
    public Function articulo(){
      return $this->BelongsTo(InvArticulosModel::class, 'articulo_id','id');
  }
    
}
