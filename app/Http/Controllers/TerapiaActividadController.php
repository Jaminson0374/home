<?php

namespace App\Http\Controllers;

use App\Models\TerapiaActividadModel;
use App\Models\ProcesosMedicosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TerapiaActividadController extends Controller
{


    public function create($idUserProgTerapia)
    {
        $dtoBasicoProgTerapia = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserProgTerapia)->get();
        $procesosMeidicos = ProcesosMedicosModel::all();
        // tipoViaAdmin
        return view('backend.controles_medicos.seguimiento_terapia.add_programacion_ta', compact('dtoBasicoProgTerapia','procesosMeidicos'));                
    }

    public function store(Request $request, TerapiaActividadModel $terapiaActividadModel )
    {
       // return $request;
       try {
        DB::beginTransaction();        
          
        //con el insert no me toma en cuenta las lista de $guarded
        $terapiaMedica = DB::table('terapia_actividad')->insert($request->all());
        // return $depodiscionCtrl;
        DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);            
    }

    public function show(Request $request, TerapiaActividadModel $terapiaActividadModel)
    {
           // return $request->datosbasicos_id;
           $showAddVisitas = DB::table('terapia_actividad')
           ->join('procesos_medicos','terapia_actividad.proceso_medico_id','=','procesos_medicos.id')
           ->where("terapia_actividad.datosbasicos_id", "=", $request->datosbasicos_id)
           ->where("terapia_actividad.anulado", "=", NULL)
           ->select("terapia_actividad.id",'terapia_actividad.fecha_ini','terapia_actividad.fecha_fin',
           'terapia_actividad.proceso_medico_id','procesos_medicos.descripcion as actividad_terapia',
           'terapia_actividad.num_sesiones')->get();
           return $showAddVisitas;    
    }

  
    public function destroy(Request $request, TerapiaActividadModel $terapiaActividadModel)
    {
         $nPlani = $request->data['dato_id'];
        try {
         DB::beginTransaction();
             $numPlanilla = TerapiaActividadModel::findOrFail($nPlani);
             $numPlanilla->anulado = "S";
             $numPlanilla->save();  
         DB::commit();
     } catch (\Exception $e) {
         DB::rollBack();
         return response()->json(['message' => 'Error']);
     }
     return response()->json(['message' => 'Success']);  
    }
}
