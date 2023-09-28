<?php

namespace App\Http\Controllers;

use App\Models\EventoAdversoModel;
use App\Models\EmpleadosModell;
use App\Models\MedicoExternoModel;
use App\Models\AcompanantesModel;
use App\Models\Cliente_datosbasico;
use App\Models\EmpresaRemitenteModell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoAdversoController extends Controller
{
 
    public function index()
    {
        $indexEventoAdverso = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','estado_user','ult_reporte_evento')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.controles_medicos.reporte_evento.admin_evento',compact('indexEventoAdverso'));  
    }

     public function create($idUserEvento)
    {
        $createEvento = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserEvento)->get();
        $empleadosEventos = EmpleadosModell::all();
        $personalExternoEvento = MedicoExternoModel::all();
        $acompananteEvento = AcompanantesModel::all();
        $empresaRemitenteEvento = EmpresaRemitenteModell::all();

        // tipoViaAdmin
        return view('backend.controles_medicos.reporte_evento.add_evento_adverso', compact('createEvento','empleadosEventos',
        'personalExternoEvento','acompananteEvento','empresaRemitenteEvento'));        
    }

     public function store(Request $request, EventoAdversoModel $eventoAdversoModel)
    {
    //  return $request->data['ult_reporte_evento'];
     try {
        DB::beginTransaction();        

        $idDtBasico = Cliente_datosbasico::find($request->data['datosbasicos_id']);
        $idDtBasico->ult_reporte_evento  = $request->data['fecha'];
        $idDtBasico->save();

        $storeAdm = EventoAdversoModel::updateOrCreate(
            ['id' => $request->data['id']],
            ['fecha' => $request->data['fecha'],
            'hora' => $request->data['hora'],
            'personalexterno_id' => $request->data['personalexterno_id'],
            'entidadremitente_id' => $request->data['entidadremitente_id'],
            'acompanante_id' => $request->data['acompanante_id'],
            'empleado_id' => $request->data['empleado_id'],
            'descripcion' => $request->data['descripcion'],
            'medio_informacion' => $request->data['medio_informacion'],
            'anexos' => $request->data['anexos'],
            'datosbasicos_id' => $request->data['datosbasicos_id'],
            'user_id' => $request->data['user_id']]);
 
        DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);   
    }

 
    public function show(Request $request, EventoAdversoModel $eventoAdversoModel)
    {
              
            $showEvento = DB::table('reporte_evento')
            ->where('reporte_evento.datosbasicos_id','=',$request->planilla_id)
            ->where("reporte_evento.anulado", "=", NULL)
            ->select("reporte_evento.id",'reporte_evento.fecha',DB::raw('substr(reporte_evento.hora,1,5) as hora'),
            'reporte_evento.descripcion','reporte_evento.empleado_id', 'reporte_evento.personalexterno_id',
            'reporte_evento.entidadremitente_id','reporte_evento.acompanante_id','reporte_evento.medio_informacion')->get(); 
            return $showEvento; 

            // ->join('empleados', 'reporte_evento.empleado_id','=','empleados.id')
            // ->join('medicos_externos', 'reporte_evento.personalexterno_id','=','medicos_externos.id')            
            /* CONCATENA, CONVIERTE A TEXTO Y SUBSTRAE
            // DB::raw('CONCAT(CONVERT(substr(reporte_evento.hora,1,2) %12, CHAR),CONVERT(substr(reporte_evento.hora,3,4), CHAR)) as hora')*/
            
    }
     
    public function edit(EventoAdversoModel $eventoAdversoModel)
    {
        //
    }

   
    public function update(Request $request, EventoAdversoModel $eventoAdversoModel)
    {
        //
    }

    public function destroy(Request $request, EventoAdversoModel $eventoAdversoModel)
    {
        $nPlani = $request->data['id'];
        try {
         DB::beginTransaction();
             $numPlanilla = EventoAdversoModel::findOrFail($nPlani);
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