<?php

namespace App\Http\Controllers;

use App\Models\DesposicionesModel;
use App\Models\Cliente_datosbasico;
use App\Models\DeposicionPlanillaModel;
use App\Models\EmpleadosModell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeposicionesController extends Controller
{

    public function index()
    {
        $clientesAdminDepo = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','planilla_actual','estado_user')
        ->where("estado_servicio", "=", "ON")->get(); 
         return view('backend.controles_medicos.deposiciones.admin_deposiciones',compact('clientesAdminDepo'));        
    }

 
    public function create($idUserBasico)
    {
        // $medicamentos = DB::table('inv_articulos')->select('id','referencia','descripcion')
        // ->where('categoria_id',1)->get(); //la categoría 1, siempre debe ser medicamentos
        // // return $medicamentos;

        $dtobasicoMed = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos', 'diagnostico')->where('id','=',$idUserBasico)->get();
        $deposicionMedMedicos = EmpleadosModell::all();
        
        return view('backend.controles_medicos.deposiciones.add_ctrl_deposiciones', compact('dtobasicoMed','deposicionMedMedicos'));
    }
    
    public function buscarPlaniDepo(Request $request, DeposicionPlanillaModel $DeposicionPlanillaModel)
    {
            /*BUSCAR TODAS PLANILLAS DEL USUARIO SELECCIONADO*/

            $showAddAsignaPlanillas = DB::table('deposicion_planilla')
            ->where('deposicion_planilla.datosbasicos_id','=',$request->datosbasicos_id)
            ->where("anulado", "=", NULL)
            ->select('deposicion_planilla.id','deposicion_planilla.mes_letra','deposicion_planilla.ano',
            'deposicion_planilla.useranomes','deposicion_planilla.mes', 
            'deposicion_planilla.anulado', 'deposicion_planilla.datosbasicos_id',)->get(); 
            return $showAddAsignaPlanillas;    
    }

    public function buscarAddPlanillas(Request $request, DesposicionesModel $DeposicionModel)
    {
        if ($request->okFalse == "01"){  //buscar la planilla del id selecionado
            // $meses = ["Enero","Febrero", "Marzo","Abril", "Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];                
            // return $meses[];
            
            $showAddAsignaPlanillas = DB::table('deposiciones')
            ->where('deposiciones.planilla_id','=',$request->planilla_id)
            ->where("deposiciones.anulado", "=", NULL)
            ->join('empleados', 'deposiciones.empleado_id','=','empleados.id')
            ->select("deposiciones.id",'deposiciones.planilla_id','deposiciones.dia_ctrl','deposiciones.dia_deposicion',
            'deposiciones.noche_deposicion','deposiciones.total_deposiciones','deposiciones.empleado_id', 
            DB::raw('CONCAT(empleados.nombre," ",empleados.apellidos) as cuidador'), 
            'deposiciones.observacion','empleados.num_documento')->get(); 
            return $showAddAsignaPlanillas;    

        }else if($request->data['okFalse']== "02"){ // validar la existencia del día en la planilla
            // return $request->data['dato_id'].' '.$request->data['okFalse'];
            $showAsignaPlanillas2 = DB::table('deposicion_planilla')
            ->where('deposicion_planilla.useranomes','=',$request->data['dato_id'])
            ->where("anulado", "=", NULL)
            ->select('deposicion_planilla.useranomes')->get();

            if(count($showAsignaPlanillas2)>0){
                $planilla = $showAsignaPlanillas2[0]->useranomes;
                return ['message'=>'Error', 'planilla' =>$planilla];
            }else{
                return ['message'=>'Success'];
        }
    }
            
    }
    public function llenaplanidiaria(){
        /*select('deposicion_planilla.id','deposicion_planilla.mes_letra','deposicion_planilla.ano_ctrl',
        'deposicion_planilla.useranomes','deposicion_planilla.dia_ctrl','deposicion_planilla.noche_ctrl',
        'deposicion_planilla.mes_ctrl','deposicion_planilla.dia_desposicion','deposicion_planilla.noche_desposicion',  
        'deposicion_planilla.total_deposiciones','deposicion_planilla.anulado', 'deposicion_planilla.datosbasicos_id',)->get();*/         
    }

    public function store(Request $request, DesposicionesModel $DeposicionModel)
    {
        // return $request->data;
        // return $request->data['datosbasicos_id'];
        try {
            DB::beginTransaction();        
            // $idDtBasico =  Cliente_datosbasico::find($request->datosbasicos_id);
            // $idDtBasico->planilla_actual = $request->planilla_actual;
            // $idDtBasico->save();
            
            $depodiscionCtrl = DB::table('deposiciones')->insert($request->all());
            // return $depodiscionCtrl;
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);

    }

    public function show(DesposicionesModel $desposicionesModel)
    {
        //
    }

    public function edit(DesposicionesModel $desposicionesModel)
    {
        //
    }

 
    public function update(Request $request, DesposicionesModel $desposicionesModel)
    {
        //
    }

    public function destroy(Request $request, DesposicionesModel $desposicionesModel)
    {
                // return $request->data['id'];
                try {
                    DB::beginTransaction();
                        $nPlani =$request->data['id'];
                        $numPlanilla = DesposicionesModel::findOrFail($nPlani);
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
