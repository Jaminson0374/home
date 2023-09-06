<?php


namespace App\Http\Controllers;

use App\Models\AsignaMedicamentosModel;
use App\Models\InvUniMedidasModel;
use App\Models\InvArticulosModel;
use App\Models\TipoAdminMedModel;
use App\Models\Cliente_datosbasico;
use App\Models\EmpleadosModell;
use App\Models\AdministraMedPermanentesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministraMedPermanentesController extends Controller
{

    public function index()
    {
        $clientesAdminMed = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','ult_fecha_admin_med','ult_hora_admin_med','estado_user')
        ->where("estado_servicio", "=", "ON")->get(); 

         return view('backend.controles_medicos.administra_medicamentos.admin_admin_mdicamtos_perma',compact('clientesAdminMed'));        
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
        
        return view('backend.controles_medicos.administra_medicamentos.administrar_medi_permanentes', compact('medicamentos','dtobasicoMed','tipoViaAdmin','uniMedId', 'medicamentos', 'empleadosAdmMed'));
    }


    
  
    public function store(Request $request, AdministraMedPermanentesModel $AdministraMedPermanentesModel)
    {
        
         try {
            DB::beginTransaction(); 
        // 'created_at' => now(),
        // 'updated_at' => now()
            // $registros2 = json_encode($request->registros);
            $numRecord =  count($request->registros);
            // foreach ($registros as $row ){
            //    $storeAdm = AdministraMedPermanentesModel::updateOrCreate(
            //     [$row->id],
            //     [$row->datosbasicos_id,
            //     $row->fecha_ingerir,
            //     $row->ok,
            //     $row->user_id,
            //     $row->asignamed_id]);
            // };
            for($i = 0; $i < $numRecord; $i++){
                $storeAdm = AdministraMedPermanentesModel::updateOrCreate(
                ['id' => $request->registros[$i]['id']], 
                ['datosbasicos_id' => $request->registros[$i]['datosbasicos_id'],
                'fecha_ingerir' => $request->registros[$i]['fecha_ingerir'],
                'ok' => $request->registros[$i]['ok'],
                'user_id' => $request->registros[$i]['user_id'],
                'asignamed_id'=> $request->registros[$i]['asignamed_id'],
                'empleado_id'=> $request->registros[$i]['empleado_id']]);
            }

            // $idDtBasico =  Cliente_datosbasico::find($request->datosbasicos_id);
            // $idDtBasico->ult_fecha_admin_med = $request->registro[$i]['fecha_ingerir'];
            // $idDtBasico->ult_hora_admin_med  = $request->registro[$i]['hora_ingerir'];
            // $idDtBasico->save();

                // Pelicula::firstOrCreate(['fk_segmento' => '1', 'fk_empresa' => '1']);
                // DB::table('administra_med_permanentes')->insert($datos);
            // }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);        
    }
 
    public function show(AdministraMedPermanentesModel $administraMedPermanentesModel)
    {
        //
    }


    public function edit(AdministraMedPermanentesModel $administraMedPermanentesModel)
    {
        //
    }

  
    public function update(Request $request, AdministraMedPermanentesModel $administraMedPermanentesModel)
    {
        //
    }

 
    public function destroy(AdministraMedPermanentesModel $administraMedPermanentesModel)
    {
        //
    }
}
