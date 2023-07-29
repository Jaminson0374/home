<?php

namespace App\Models;

use App\Models\backend\TipoDocumentoModell;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Clientes extends Model
{
    use HasFactory;
    use SoftDeletes;
    
             
    protected $table = 'clientes';

    protected $guarded = [ 
        '_method',
        '_token',
        'accionBotones',
        'btnSave',
        'id',
        'idClienteServicio',
        'tieneServicio',
        'accionBotones',
        'softDeletes', 
        'timestamps', 
        // 'updated_at', 
        // 'created_at',
        // 'deleted_at'     
    ];
 
    public function tipodoc(): BelongsTo
    {
        
        return $this->belongsTo(TipoDocumentoModell::class, 'id_tipodoc');
     
    }   

    public function datosBasicos(): BelongsTo
    {
        return $this->belongsTo(Cliente_datosbasico::class, 'datosbasicos_id');

    }
         
    public function tipoServicios(): BelongsTo
    {
        return $this->belongsTo(Tiposervicio::class, 'tiposervicio_id');

    }     
    
 
}

//la propiedad $fillable se hace para poder hacer asingación masiva desde el controlador

    /*protected $fillable = [
        'tipo_usuario' , 
        'tipo_servicios'        ,            
        'tipo_documento'        ,
        'num_documento'         ,
        'nombre'                ,
        'apellidos'             ,
        'sexo'                  ,
        'pais_nacimiento'       ,
        'dpto_nacimiento'       ,
        'ciudad_nacimiento'     ,
        'fecha_nacimiento'      ,
        'grupo_sanguineo'       ,
        'direccion_res'         ,  
        'telefonos_user'        ,
        'email_user'            ,
        'nombre_acompanante'    ,
        'telefono_acompanante'  ,
        'email_acompanante'     ,
        'instituto_remitente'   ,
        'medico_remitente'      ,
        'tipo_afiliacion'       ,
        'grupo_rango_eps'       ,
        'cubiculo'              ,
        'fecha_ingreso'         ,
        'fecha_retiro'          ,
        'num_dias'              ,
        'cuidador_recibe'       ,
        'num_factura'           ,
        'fecha_factura'         ,
        'estado_cliente'        ,
        'observacion'        
    ];*/

    
    //protected $dates = ['fecha_nacimiento']; //para el formato carbon de las fechas

    //protected $guarded = [campos que no queremos que se guarden]  // hace lo contrario a $fillable
    // si se deja vacio interpreta que no hay ningún campo protegido, es decir va a guardar todos los campos. protected $guarded = []
