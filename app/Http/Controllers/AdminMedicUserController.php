<?php

namespace App\Http\Controllers;

use App\Models\AdminMedicUserModel;
use App\Models\Cliente_datosbasico;
use App\Models\InvArticulosModel;
use App\Models\TipoAdminMedModel;
use App\Models\InvUniMedidasModel;
use App\Models\EmpleadosModell;
use App\Models\RequisicionMedicamentodsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMedicUserController extends Controller
{
    public function index()
    {
        $clientesAdminMed = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','ult_fecha_admin_med','ult_hora_admin_med','estado_user')
        ->where("estado_servicio", "=", "ON")->get(); 

         return view('backend.controles_medicos.administra_medicamentos.admin_administra_mdicamtos',compact('clientesAdminMed'));        
    }


    public function create($idUserBasico)
    {
        $medicamentos = DB::table('inv_articulos')->select('id','referencia','descripcion')
        ->where('categoria_id',1)->get(); //la categoría 1, siempre debe ser medicamentos
        // return $medicamentos;

        $dtobasicoMed = DB::table('cliente_datosbasicos')->select('id','num_documento','nombre','apellidos')->where('id','=',$idUserBasico)->get();
        $tipoViaAdmin = TipoAdminMedModel::all();
        $uniMedId = InvUniMedidasModel::all();
                
        $adminMedMedicos = DB::table('empleados')->select('id','nombre','apellidos')
        ->where('categoria_id',2)->get(); //la categoría 2, siempre debe ser medicos, enfermero(a)s

        // $dtobasicoMed = Cliente_datosbasico::all()->where('id','=',$idUserBasico);

        
        return view('backend.controles_medicos.administra_medicamentos.add_admin_medicamento', compact('medicamentos','dtobasicoMed','tipoViaAdmin','uniMedId', 'adminMedMedicos', 'medicamentos'));
    }

 
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();        
            $idDtBasico =  Cliente_datosbasico::find($request->datosbasicos_id);
            $idDtBasico->ult_fecha_admin_med = $request->fecha;
            $idDtBasico->ult_hora_admin_med  = $request->hora;
            $idDtBasico->save();
            
            $AdminMedicamentos = AdminMedicUserModel::create($request->all()); 

            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
    }


    public function show(AdminMedicUserModel $adminMedicUserModel)
    {
        //
    }

 
    public function edit(AdminMedicUserModel $adminMedicUserModel)
    {
        //
    }


    public function update(Request $request, AdminMedicUserModel $adminMedicUserModel)
    {
        //
    }

 
    public function destroy(AdminMedicUserModel $adminMedicUserModel)
    {
        //
    }
}
