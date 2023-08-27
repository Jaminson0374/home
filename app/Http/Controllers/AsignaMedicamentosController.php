<?php

namespace App\Http\Controllers;

use App\Models\AsignaMedicamentosModel;
use App\Models\AdministraMedPermanentesController;
use App\Models\AdministraMedPermanentesModel;
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
        $tipoViaAdmin = TipoAdminMedModel::all();
        $uniMedId = InvUniMedidasModel::all();
        
        return view('backend.controles_medicos.administra_medicamentos.administrar_medi_permanentes', compact('medicamentos','dtobasicoMed','tipoViaAdmin','uniMedId', 'medicamentos'));
        // return view('backend.controles_medicos.administra_medicamentos.asignar_medicamentos', compact('medicamentos','dtobasicoMed','tipoViaAdmin','uniMedId', 'medicamentos'));
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
            // return $AdminMedicamentos;
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
    }


    public function show(Request $request, AsignaMedicamentosModel $asignaMedicamentosModel)
    {
            //  return $request->dato_id;
            // return $request->fecha_ingerir;
            // ->where('administra_med_permanentes.fecha_ingerir','=',$date_today)
            $date_today = date("Y-m-d", strtotime($request->fecha_ingerir));
            $adminMedicPerma = DB::table('administra_med_permanentes')->where('administra_med_permanentes.datosbasicos_id','=',$request->dato_id)
            ->where('administra_med_permanentes.fecha_ingerir','=',$date_today)
            ->join('asigna_medicamentos', 'administra_med_permanentes.asignamed_id','=','asigna_medicamentos.id')
            ->join('inv_articulos', 'administra_med_permanentes.articulos_id','=','inv_articulos.id')
            ->join('inv_unimedidas', 'administra_med_permanentes.unimedida_id','=','inv_unimedidas.id')
            ->join('tipo_admin_med_user', 'administra_med_permanentes.tipoadmin_med_id','=','tipo_admin_med_user.id')
            ->select('administra_med_permanentes.asignamed_id','administra_med_permanentes.asignamed_id','asigna_medicamentos.id','administra_med_permanentes.asignamed_id',
            'administra_med_permanentes.fecha_ingerir','asigna_medicamentos.hora', 'asigna_medicamentos.dosis',
            'asigna_medicamentos.pososlogia_t','asigna_medicamentos.pososlogia_h_d', 'administra_med_permanentes.unimedida_id', 
            'administra_med_permanentes.tipoadmin_med_id','administra_med_permanentes.indicaciones','administra_med_permanentes.articulos_id',
            'inv_articulos.descripcion as medicamento',
            'tipo_admin_med_user.descripcion as via_admin','inv_unimedidas.descripcion as medida')            
            ->get();

            if(count($adminMedicPerma)>0){
                return $adminMedicPerma;
                
            }else{
                
                $showAsignaMedicamento = DB::table('asigna_medicamentos')
                ->join('inv_articulos', 'asigna_medicamentos.articulos_id','=','inv_articulos.id')
                ->join('inv_unimedidas', 'asigna_medicamentos.unimedida_id','=','inv_unimedidas.id')
                ->join('tipo_admin_med_user', 'asigna_medicamentos.tipoadmin_med_id','=','tipo_admin_med_user.id')
                ->select('asigna_medicamentos.id','asigna_medicamentos.datosbasicos_id','asigna_medicamentos.articulos_id',
                'asigna_medicamentos.fecha_inicio','asigna_medicamentos.hora', 'asigna_medicamentos.dosis',
                'asigna_medicamentos.pososlogia_t','asigna_medicamentos.pososlogia_h_d', 'asigna_medicamentos.unimedida_id', 
                'asigna_medicamentos.tipoadmin_med_id','asigna_medicamentos.indicaciones',
                'inv_articulos.descripcion as medicamento',
                'tipo_admin_med_user.descripcion as via_admin','inv_unimedidas.descripcion as medida')
                ->where('datosbasicos_id','=',$request->dato_id)->get(); 
                return $showAsignaMedicamento;
            }
    }

 
    public function edit(AsignaMedicamentosModel $asignaMedicamentosModel)
    {
        //
    }
 
    public function update(Request $request, AsignaMedicamentosModel $asignaMedicamentosModel)
    {
        try {
            DB::beginTransaction();
                $idCli=$request['idAsignaMedica'];
                $epsUpdate = AsignaMedicamentosModel::findOrFail($idCli);
                $epsUpdate->fill($request->all());
                $epsUpdate->save();  
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);        
            // return $epsUpdate;           
    }


    public function destroy(AsignaMedicamentosModel $asignaMedicamentosModel)
    {
        //
    }
}
