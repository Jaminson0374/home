<?php

namespace App\Http\Controllers;

use App\Models\DeposicionPlanillaModel;
use App\Models\Cliente_datosbasico;
use App\Models\EmpleadosModell;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use LengthException;

class DeposicionPlanillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientesAdminDepo = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','planilla_actual','estado_user')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
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
        
        return view('backend.controles_medicos.deposiciones.planillas_deposiciones', compact('dtobasicoMed'));
    }
    
    public function buscar_planillas(Request $request, DeposicionPlanillaModel $DeposicionPlanillaModel)
    {
       
            if ($request->okFalse == "01"){  //buscar todas las planilla del id selecionado
                // $meses = ["Enero","Febrero", "Marzo","Abril", "Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];                
                // return $meses[];
                $showAsignaPlanillas = DB::table('deposicion_planilla')
                ->where('deposicion_planilla.datosbasicos_id','=',$request->datosbasicos_id)
                ->where("anulado", "=", NULL)
                ->select('deposicion_planilla.id','deposicion_planilla.datosbasicos_id','deposicion_planilla.mes_letra',
                'deposicion_planilla.useranomes','deposicion_planilla.created_at','deposicion_planilla.mes', 'deposicion_planilla.ano',
                'deposicion_planilla.anulado')->get(); 
                return $showAsignaPlanillas;    

            }else if($request->data['okFalse']== "02"){ // validar la existencia de la planilla
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
        // return $request->data;
        // return $request->data['datosbasicos_id'];
        try {
            DB::beginTransaction();        
            // $idDtBasico =  Cliente_datosbasico::find($request->datosbasicos_id);
            // $idDtBasico->planilla_actual = $request->planilla_actual;
            // $idDtBasico->save();
            
            $AdminMedicamentos = DB::table('deposicion_planilla')->insert($request->all());
            // return $AdminMedicamentos;
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
    }


    public function show(DeposicionPlanillaModel $deposicionPlanillaModel)
    {
        //
    }

    public function edit(DeposicionPlanillaModel $deposicionPlanillaModel)
    {
        //
    }

    public function update(Request $request, DeposicionPlanillaModel $deposicionPlanillaModel)
    {
        //
    }
  
    public function destroy(Request $request, DeposicionPlanillaModel $deposicionPlanillaModel)
    {
            // return $request->data['id'];
            try {
                DB::beginTransaction();
                    $nPlani =$request->data['id'];
                    $numPlanilla = DeposicionPlanillaModel::findOrFail($nPlani);
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
