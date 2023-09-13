<?php

namespace App\Http\Controllers;

use App\Models\CtrlGlucometriaModel;
use App\Models\EmpleadosModell;
use App\Models\Cliente_datosbasico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CtlGlucometriaController extends Controller
{
    public function index()
    {
        $clientesAdminGluco = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','estado_user','fecha_gluco')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.controles_medicos.glucometria.admin_glucometria',compact('clientesAdminGluco'));      
    }

    public function create($idUserBasico)
    {
    //     $medicamentos = DB::table('inv_articulos')->select('id','referencia','descripcion')
    //     ->where('categoria_id',1)->get(); //la categoría 1, siempre debe ser medicamentos
        // return $medicamentos;

        $dtobasicoMed = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos', 'diagnostico')->where('id','=',$idUserBasico)->get();
        $empleadosAdmMed = EmpleadosModell::all();
        // tipoViaAdmin
        return view('backend.controles_medicos.glucometria.add_planilla_glucometria', compact('dtobasicoMed','empleadosAdmMed'));
    }


    public function store(Request $request, CtrlGlucometriaModel $CtrlGlucometriaModel)
    {
        // return $request;
        try {
            DB::beginTransaction();        
            $idDtBasico = Cliente_datosbasico::find($request->datosbasicos_id);
            $idDtBasico->fecha_gluco = $request->fecha;
            $idDtBasico->save();
            
            $depodiscionCtrl = DB::table('ctrl_glucometria')->insert($request->all());
            // return $depodiscionCtrl;
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
    }

     public function show(Request $request, CtrlGlucometriaModel $ctrlGlucometriaModel)
    {
            // return $request->datosbasicos_id;
            $showAddAsignaPlanillas = DB::table('ctrl_glucometria')
            ->where("ctrl_glucometria.datosbasicos_id", "=", $request->datosbasicos_id)
            ->where("ctrl_glucometria.anulado", "=", NULL)
            ->join('empleados', 'ctrl_glucometria.empleado_id','=','empleados.id')
            ->select("ctrl_glucometria.id",'ctrl_glucometria.fecha','ctrl_glucometria.hora',
            'ctrl_glucometria.glucometria', 'ctrl_glucometria.empleado_id','empleados.num_documento', 
            DB::raw('CONCAT(empleados.nombre," ",empleados.apellidos) as cuidador'), 
            'ctrl_glucometria.observaciones')->get(); 
            return $showAddAsignaPlanillas;    
    }

     public function edit(CtrlGlucometriaModel $ctrlGlucometriaModel)
    {
        //
    }

 
    public function update(Request $request, CtrlGlucometriaModel $ctrlGlucometriaModel)
    {
        //
    }

 
    public function destroy(Request $request, CtrlGlucometriaModel $ctrlGlucometriaModel)
    {
              $nPlani = $request->data['dato_id'];
               try {
                DB::beginTransaction();
                    $numPlanilla = CtrlGlucometriaModel::findOrFail($nPlani);
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
