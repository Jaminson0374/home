<?php

namespace App\Http\Controllers;

use App\Models\Cliente_datosbasico;
use App\Models\VisitaProfesionalesModel;
use App\Models\EmpleadosModell;
use App\Models\MedicoExternoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitaProfesionalesController extends Controller
{
  
    public function index()
    {
        $clientesVisitasPro = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','estado_user','ultima_visita_pro')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.controles_medicos.visitas_medicas_pro.admin_visitas_pro',compact('clientesVisitasPro'));  
    }

 
    public function create($idUserVisita)
    {
        $dtobasicoVisitas = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserVisita)->get();
        $empleadosVisitas = EmpleadosModell::all();
        $personalExternoVisitas = MedicoExternoModel::all();
        // tipoViaAdmin
        return view('backend.controles_medicos.visitas_medicas_pro.add_visitas_pro', compact('dtobasicoVisitas','empleadosVisitas','personalExternoVisitas'));        
    }
    
    public function store(Request $request, VisitaProfesionalesModel $visitaProfesionalesModel)
    {
        // return $request;
        try {
            DB::beginTransaction();        
            $idDtBasico = Cliente_datosbasico::find($request->datosbasicos_id);
            $idDtBasico->ultima_visita_pro = $request->fecha;
            $idDtBasico->save();

              // con created si me toma en cuenta la lista $Guarded
            // $visitaPro = VisitaProfesionalesModel::create($request->all()); 
              
            //con el insert no me toma en cuenta las lista de $guarded
            $visitaPro = DB::table('visita_profesionales')->insert($request->all());
            // return $depodiscionCtrl;
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);        
    }

 
    public function show(Request $request, VisitaProfesionalesModel $visitaProfesionalesModel)
    {
            // return $request->datosbasicos_id;
            $showAddVisitas = DB::table('visita_profesionales')
            ->where("visita_profesionales.datosbasicos_id", "=", $request->datosbasicos_id)
            ->where("visita_profesionales.anulado", "=", NULL)
            ->join('empleados', 'visita_profesionales.empleado_id','=','empleados.id')
            ->join('medicos_externos', 'visita_profesionales.personalexterno_id','=','medicos_externos.id')
            ->select("visita_profesionales.id",'visita_profesionales.fecha','visita_profesionales.hora',
             'visita_profesionales.empleado_id','visita_profesionales.personalexterno_id','visita_profesionales.observacion', 
            DB::raw('CONCAT(empleados.nombre," ",empleados.apellidos) as cuidador'),
            DB::raw('CONCAT(medicos_externos.nombre," " ,medicos_externos.apellidos) as profesional'),
            'visita_profesionales.observacion', 'visita_profesionales.anulado') ->get(); 
            return $showAddVisitas;    
    }

      public function edit(VisitaProfesionalesModel $visitaProfesionalesModel)
    {
        //
    }

     public function update(Request $request, VisitaProfesionalesModel $visitaProfesionalesModel)
    {
        //
    }

     public function destroy(Request $request, VisitaProfesionalesModel $visitaProfesionalesModel)
    {
        $nPlani = $request->data['dato_id'];
        try {
         DB::beginTransaction();
             $numPlanilla = VisitaProfesionalesModel::findOrFail($nPlani);
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
