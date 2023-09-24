<?php

namespace App\Http\Controllers;

use App\Models\ChequeoDiarioModel;
use App\Models\EmpleadosModell;
use App\Models\Cliente_datosbasico;
use App\Models\ChequeoPlanillaModel;
use App\Models\ChequeoListaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChequeoDiarioController extends Controller
{

    public function index()
    {
        $indexChequeoTurno = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','estado_user','ult_cambio_turno')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.controles_medicos.chequeo_entrega_turno.admin_chequeo_turno',compact('indexChequeoTurno'));        //
    }

    public function create($idUserChequeo)
    {
        $createChequeo = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserChequeo)->get();
        $empleadosChequeos = EmpleadosModell::all();

        // tipoViaAdmin
        return view('backend.controles_medicos.chequeo_entrega_turno.add_chequeo_turno', compact('createChequeo','empleadosChequeos'));      
    }

    public function store(Request $request)
    {
        // return $request->data['registros'][0]['si_no'];
        try {
            DB::beginTransaction(); 
            $numRecord =  count($request->data['registros']);

            $idSchequeoPlanilla = $request->data['planilla_id'];; 
            if($request->data['new_update'] === "newReg"){   //NUEVA PLANILLA
                $chekeoTurno = new ChequeoPlanillaModel();
                $chekeoTurno->fecha = $request->data['fecha'];
                $chekeoTurno->hora = $request->data['hora'];
                $chekeoTurno->cuidador_entrega_id = $request->data['cuidador_entrega_id'];
                $chekeoTurno->cuidador_recibe_id = $request->data['cuidador_recibe_id'];
                $chekeoTurno->turno_entrega = $request->data['turno_entrega'];
                $chekeoTurno->datosbasicos_id = $request->data['datosbasicos_id'];
                $chekeoTurno->user_id = $request->data['user_id'];
                $chekeoTurno->save();
                $id = $chekeoTurno->id;
                    for($i = 0; $i < $numRecord; $i++){
                        $storeAdm = ChequeoDiarioModel::updateOrCreate(
                        ['id' => $request->data['registros'][$i]['id']], 
                        ['observacion' => $request->data['registros'][$i]['observacion'],
                        'si_no' => $request->data['registros'][$i]['si_no'],
                        'user_id' => $request->data['user_id'],
                        'planilla_id'=> $id,
                        'listachequeo_id' => $request->data['registros'][$i]['listachequeo_id']
                        ]);
                    };
            }else if($request->data['new_update'] === "updateReg"){
                for($i = 0; $i < $numRecord; $i++){
                    $storeAdm = ChequeoDiarioModel::updateOrCreate(
                    ['id' => $request->data['registros'][$i]['id']], 
                    ['observacion' => $request->data['registros'][$i]['observacion'],
                    'si_no' => $request->data['registros'][$i]['si_no'],
                    'user_id' => $request->data['user_id']
                    ]);
                }
            }
                $idDtBasico =  Cliente_datosbasico::find($request->data['datosbasicos_id']);
                $idDtBasico->ult_cambio_turno = $request->data['fecha'];
                $idDtBasico->save();
                // Pelicula::firstOrCreate(['fk_segmento' => '1', 'fk_empresa' => '1']);
                // DB::table('administra_med_permanentes')->insert($datos);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);            
  
    }

  
    public function show(Request $request, ChequeoDiarioModel $chequeoDiarioModel) //LLena la tabla del modal con las planillas (encabezado)
    {
        $showChequeo = DB::table('chequeo_planilla')
        ->where('chequeo_planilla.datosbasicos_id','=',$request->datosbasicos_id)
        ->where("chequeo_planilla.anulado", "=", NULL)
        ->join('empleados', 'chequeo_planilla.cuidador_entrega_id','=','empleados.id')
        ->select("chequeo_planilla.id",'chequeo_planilla.fecha',DB::raw('substr(chequeo_planilla.hora,1,5) as hora'),
        'chequeo_planilla.cuidador_entrega_id','chequeo_planilla.cuidador_recibe_id', 'chequeo_planilla.turno_entrega',
        DB::raw('CONCAT(empleados.nombre," ",empleados.apellidos) as entrega', 'chequeo_planilla.datosbasicos_id'))->get(); 
        return $showChequeo; 
        

        // ->join('empleados', 'reporte_evento.empleado_id','=','empleados.id')
        // ->join('medicos_externos', 'reporte_evento.personalexterno_id','=','medicos_externos.id')            
        /* CONCATENA, CONVIERTE A TEXTO Y SUBSTRAE
        // DB::raw('CONCAT(CONVERT(substr(reporte_evento.hora,1,2) %12, CHAR),CONVERT(substr(reporte_evento.hora,3,4), CHAR)) as hora')*/
    }

    public function busquedaChequeo(Request $request, ChequeoDiarioModel $chequeoDiarioModel)  // Parra llenar la tabla con la lista de chequeos de la planilla seleccionada
    {
        // return $request->planilla_id;
        $showDiarioChequeo = DB::table('chequeo_diario')
        ->where('chequeo_diario.planilla_id','=',$request->planilla_id)
        ->where("chequeo_diario.anulado", "=", NULL)
        ->join('chequeo_lista','chequeo_diario.planilla_id','=','chequeo_lista.id')
        ->select("chequeo_diario.id",'chequeo_diario.planilla_id',
        'chequeo_diario.si_no','chequeo_diario.observacion', 
        'chequeo_lista.descripcion')->get(); 
        return $showDiarioChequeo;         
    }    
    
    public function busquedaListaChequeo(Request $request, ChequeoListaModel $chequeoListaModel) //Cuando se presiona el botón nuevo
    {
        $showNuevaLista = ChequeoListaModel::where("anulado", "=", NULL)->get();
        return $showNuevaLista; 
    }       
    
    public function destroy(ChequeoDiarioModel $chequeoDiarioModel)
    {
        //
    }
}
