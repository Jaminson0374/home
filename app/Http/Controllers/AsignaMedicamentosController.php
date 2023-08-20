<?php

namespace App\Http\Controllers;

use App\Models\AsignaMedicamentosModel;
use App\Models\InvUniMedidasModel;
use App\Models\InvArticulosModel;
use App\Models\TipoAdminMedModel;
use App\Models\Cliente_datosbasico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignaMedicamentosController extends Controller
{

    public function index()
    {
        //
    }

    public function create($idUserBasico)
    {
        $medicamentos = DB::table('inv_articulos')->select('id','referencia','descripcion')
        ->where('categoria_id',1)->get(); //la categoría 1, siempre debe ser medicamentos
        // return $medicamentos;

        $dtobasicoMed = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos', 'diagnostico')->where('id','=',$idUserBasico)->get();
        $tipoViaAdmin = AsignaMedicamentosModel::all();
        $uniMedId = InvUniMedidasModel::all();
                
        return view('backend.controles_medicos.administra_medicamentos.asignar_medicamentos', compact('medicamentos','dtobasicoMed','tipoViaAdmin','uniMedId', 'medicamentos'));
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();        
            // $idDtBasico =  Cliente_datosbasico::find($request->datosbasicos_id);
            // $idDtBasico->ult_fecha_admin_med = $request->fecha;
            // $idDtBasico->ult_hora_admin_med  = $request->hora;
            // $idDtBasico->save();
            
            $AdminMedicamentos = AsignaMedicamentosModel::create($request->all()); 

            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
    }


    public function show(AsignaMedicamentosModel $asignaMedicamentosModel)
    {
        //
    }

 
    public function edit(AsignaMedicamentosModel $asignaMedicamentosModel)
    {
        //
    }

 
    public function update(Request $request, AsignaMedicamentosModel $asignaMedicamentosModel)
    {
        //
    }


    public function destroy(AsignaMedicamentosModel $asignaMedicamentosModel)
    {
        //
    }
}
