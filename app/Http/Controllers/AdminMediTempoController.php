<?php

namespace App\Http\Controllers;

use App\Models\AdminMediTempoModel;
use App\Models\InvUniMedidasModel;
use App\Models\TipoAdminMedModel;
use App\Models\EmpleadosModell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMediTempoController extends Controller
{   
 
    public function index()
    {
        $clientesAdminMed = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','ult_fec_adm_med_tmp','ult_hora_adm_med_tmp','estado_user')
        ->where("estado_servicio", "=", "ON")->get(); 

         return view('backend.controles_medicos.administra_medicamentos.admin_admin_mdi_tempo',compact('clientesAdminMed'));        
    }

    
    public function create($idUserBasico)
    {
        $medicamentos = DB::table('inv_articulos')->select('id','referencia','descripcion')
        ->where('categoria_id',1)->get(); //la categoría 1, siempre debe ser medicamentos
        // return $medicamentos;

        $dtobasicoMed = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos', 'diagnostico')->where('id','=',$idUserBasico)->get();
        $tipoViaAdmin = TipoAdminMedModel::all();
        $uniMedId = InvUniMedidasModel::all();
        $empleadosAdmMed = EmpleadosModell::all();
        
        return view('backend.controles_medicos.administra_medicamentos.administrar_medi_tempo', compact('medicamentos','dtobasicoMed','tipoViaAdmin','uniMedId', 'medicamentos', 'empleadosAdmMed'));
    }
  
    public function store(Request $request)
    {
        try {
            DB::beginTransaction(); 
             // $registros2 = json_encode($request->registros);
             $numRecord =  count($request->registros);
            //  return $numRecord;
            for($i = 0; $i < $numRecord; $i++){
                $storeAdm = AdminMediTempoModel::updateOrCreate(
                ['id' => $request->registros[$i]['id']], 
                ['datosbasicos_id' => $request->registros[$i]['datosbasicos_id'],
                'fecha_ingerir' => $request->registros[$i]['fecha_ingerir'],
                'ok' => $request->registros[$i]['ok'],
                'user_id' => $request->registros[$i]['user_id'],
                'asignamed_id'=> $request->registros[$i]['asignamed_id'],
                'empleado_id'=> $request->registros[$i]['empleado_id']]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);        
    }
    
}
