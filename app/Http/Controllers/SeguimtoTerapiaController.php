<?php

namespace App\Http\Controllers;

use App\Models\SeguimtoTerapiaModel;
use App\Models\EmpleadosModell;
use App\Models\MedicoExternoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeguimtoTerapiaController extends Controller
{

    public function index()
    {
        $indexSeguiTerapia = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','estado_user','ult_seguimto_terapia')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.controles_medicos.seguimiento_terapia.admin_segui_terapia',compact('indexSeguiTerapia'));  
    }

 
    public function create($idUserVisita)
    {
        $createSeguiTerapia = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserVisita)->get();
        $empleadosSeguiTerapia = EmpleadosModell::all();
        $personalExternoTerapia = MedicoExternoModel::all();
        // tipoViaAdmin
        return view('backend.controles_medicos.seguimiento_terapia.add_segui_terapia', compact('createSeguiTerapia','empleadosSeguiTerapia','personalExternoTerapia'));        
    }


    public function store(Request $request, SeguimtoTerapiaModel $seguimtoTerapiaModel)
    {
      // return $request;
      try {
        DB::beginTransaction();        
          
        //con el insert no me toma en cuenta las lista de $guarded
        $terapiaSeguiMedica = DB::table('seguimto_terapia')->insert($request->all());
        // return $depodiscionCtrl;
        DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);     
    }

 
    public function show_modal(Request $request, SeguimtoTerapiaModel $seguimtoTerapiaModel)
    {
        //Busqueda para llenar planilla del modal
        $showAddAsignaPlanillas = DB::table('terapia_actividad')
        ->where('terapia_actividad.datosbasicos_id','=',$request->datosbasicos_id)
        ->join('procesos_medicos','terapia_actividad.proceso_medico_id','=','procesos_medicos.id')
        ->where("terapia_actividad.anulado", "=", NULL)
        ->select('terapia_actividad.id','terapia_actividad.proceso_medico_id','terapia_actividad.fecha_ini',
        'terapia_actividad.fecha_fin','terapia_actividad.num_sesiones','procesos_medicos.descripcion',
        'terapia_actividad.anulado', 'terapia_actividad.datosbasicos_id',
        )->get(); 
        
        return $showAddAsignaPlanillas;    
    }


    public function showPlaniPrincipal(Request $request,SeguimtoTerapiaModel $seguimtoTerapiaModel)
    {
        if ($request->okFalse == "01"){  //buscar la planilla del id selecionado
            // $meses = ["Enero","Febrero", "Marzo","Abril", "Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];                
            // return $meses[];
            
            $showAddAsignaPlanillas = DB::table('seguimto_terapia')
            ->where('seguimto_terapia.planilla_id','=',$request->planilla_id)
            ->where("seguimto_terapia.anulado", "=", NULL)
            ->join('empleados', 'seguimto_terapia.empleado_id','=','empleados.id')
            ->join('medicos_externos', 'seguimto_terapia.personalexterno_id','=','medicos_externos.id')
            ->select("seguimto_terapia.id",'seguimto_terapia.planilla_id','seguimto_terapia.sesion',
            'seguimto_terapia.hora','seguimto_terapia.fecha','seguimto_terapia.descripcion','seguimto_terapia.empleado_id', 
            'empleados.nombre as cuidador','medicos_externos.nombre as profesional', 'seguimto_terapia.personalexterno_id',
            DB::raw('CONCAT(CONVERT(substr(seguimto_terapia.hora,1,2), CHAR),CONVERT(substr(seguimto_terapia.hora,3,3), CHAR)) as hora'),
            'medicos_externos.doc_identidad','empleados.num_documento', 'seguimto_terapia.empleado_id')->get(); 
            // DB::raw('CONCAT(CONVERT(substr(seguimto_terapia.hora,1,2) %12, CHAR),CONVERT(substr(seguimto_terapia.hora,3,4), CHAR)) as hora'),
            return $showAddAsignaPlanillas; 
        }
    }
            
 
     public function destroy(Request $request, SeguimtoTerapiaModel $seguimtoTerapiaModel)
    {
        $nPlani = $request->data['id'];
        try {
         DB::beginTransaction();
             $numPlanilla = SeguimtoTerapiaModel::findOrFail($nPlani);
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
