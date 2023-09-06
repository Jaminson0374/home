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
        $empleadosAdmMed = EmpleadosModell::all();
        
        return view('backend.controles_medicos.deposiciones.add_ctrl_deposiciones', compact('dtobasicoMed'));
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
            ->where('deposicion_planilla.datosbasicos_id','=',$request->datosbasicos_id)
            ->where("anulado", "=", NULL)
            ->select('deposicion_planilla.id','deposicion_planilla.mes_letra','deposicion_planilla.ano',
            'deposicion_planilla.useranomes','deposicion_planilla.mes', 
            'deposicion_planilla.anulado', 'deposicion_planilla.datosbasicos_id',)->get(); 
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

    public function store(Request $request, DeposicionPlanillaModel $deposicionPlanillaModel)
    {
        return 'jaminson'.$request->all();
        try {
            DB::beginTransaction();        
            // $idDtBasico =  Cliente_datosbasico::find($request->datosbasicos_id);
            // $idDtBasico->planilla_actual = $request->planilla_actual;
            // $idDtBasico->save();
            
            $AdminMedicamentos = DeposicionPlanillaModel::create($request->all()); 

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

    public function destroy(DesposicionesModel $desposicionesModel)
    {
        //
    }
}
