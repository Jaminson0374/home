<?php

namespace App\Http\Controllers;

use App\Models\AsigMediTempoModel;
use App\Models\AdminMediTempoModel;
use Illuminate\Http\Request;
use App\Models\InvUniMedidasModel;
use App\Models\TipoAdminMedModel;
use App\Models\MedicoExternoModel;
use Illuminate\Support\Facades\DB;

class AsigMediTempoController extends Controller
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
        $personalExternoTempo = MedicoExternoModel::all();
        return view('backend.controles_medicos.administra_medicamentos.asignar_med_tempo', compact('medicamentos','personalExternoTempo','dtobasicoMed','tipoViaAdmin','uniMedId', 'medicamentos'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();        
            $AdminMedicamentos = AsigMediTempoModel::create($request->all()); 
            // return $AdminMedicamentos;

              DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
    }
  
    public function show(Request $request, AsigMediTempoModel $asigMediTempoModel)
    {
        // return $request;    
        //  return 'jaminson'.$request->dato_id;
            // return 'jaminson'.$request->fecha_ingerir;
            // ->where('administra_med_permanentes.fecha_ingerir','=',$date_today)
            $date_today = date("Y-m-d", strtotime($request->fecha_ingerir));
            // return 'jaminson'.$date_today;
             
            $adminMedicPerma = DB::table('admin_med_tempo')
            ->where('admin_med_tempo.datosbasicos_id','=',$request->dato_id)
            ->where('admin_med_tempo.fecha_ingerir','=',$date_today)
            ->join('asig_med_tempo', 'admin_med_tempo.asignamed_id','=','asig_med_tempo.id')
            ->join('inv_articulos', 'asig_med_tempo.articulos_id','=','inv_articulos.id')
            ->join('inv_unimedidas', 'asig_med_tempo.unimedida_id','=','inv_unimedidas.id')
            ->join('tipo_admin_med_user', 'asig_med_tempo.tipoadmin_med_id','=','tipo_admin_med_user.id')
            ->select('admin_med_tempo.id','admin_med_tempo.asignamed_id','admin_med_tempo.asignamed_id','asig_med_tempo.id as asig_id',
            'admin_med_tempo.fecha_ingerir','asig_med_tempo.hora', 'asig_med_tempo.dosis',
            'asig_med_tempo.pososlogia_t','asig_med_tempo.pososlogia_h_d', 'asig_med_tempo.personalexterno_id',
            'asig_med_tempo.tipoadmin_med_id','admin_med_tempo.indicaciones','asig_med_tempo.articulos_id',
            'inv_articulos.descripcion as medicamento','inv_articulos.descripcion as medi','admin_med_tempo.ok',
            'tipo_admin_med_user.descripcion as via_admin','inv_unimedidas.descripcion as medida',
            'asig_med_tempo.fecha_inicio','asig_med_tempo.fecha_fin','asig_med_tempo.dx')            
            ->get();

            if(count($adminMedicPerma)>0){
                return $adminMedicPerma;
                
            }else{
                $showAsignaMedicamento = DB::table('asig_med_tempo')
                ->join('inv_articulos', 'asig_med_tempo.articulos_id','=','inv_articulos.id')
                ->join('inv_unimedidas', 'asig_med_tempo.unimedida_id','=','inv_unimedidas.id')
                ->join('tipo_admin_med_user', 'asig_med_tempo.tipoadmin_med_id','=','tipo_admin_med_user.id')
                ->join('medicos_externos', 'asig_med_tempo.personalexterno_id','=','medicos_externos.id')
                ->select('asig_med_tempo.id','asig_med_tempo.datosbasicos_id','asig_med_tempo.articulos_id',
                'asig_med_tempo.id as asignamed_id', 'asig_med_tempo.ok','asig_med_tempo.dx','asig_med_tempo.fecha_fin',
                'asig_med_tempo.fecha_inicio','asig_med_tempo.hora', 'asig_med_tempo.dosis', 'asig_med_tempo.duracion_dias',
                'asig_med_tempo.pososlogia_t','asig_med_tempo.pososlogia_h_d', 'asig_med_tempo.unimedida_id', 
                'asig_med_tempo.tipoadmin_med_id','asig_med_tempo.indicaciones', 'asig_med_tempo.personalexterno_id',
                'inv_articulos.descripcion as medicamento','inv_articulos.descripcion as medi',
                'tipo_admin_med_user.descripcion as via_admin','inv_unimedidas.descripcion as medida',
                'asig_med_tempo.fecha_inicio','asig_med_tempo.fecha_fin','asig_med_tempo.dx')
                ->where('asig_med_tempo.datosbasicos_id','=',$request->dato_id)->get(); 
                return $showAsignaMedicamento;
            }
    }

    public function buscar_asigTempo(Request $request, AsigMediTempoModel $asigMediTempoModel)
    {
           //  return 'jaminson'.$request->dato_id;
            // return 'jaminson'.$request->fecha_ingerir;
            // ->where('administra_med_permanentes.fecha_ingerir','=',$date_today)
            // $date_today = date("Y-m-d", strtotime($request->fecha_ingerir));
            // return 'jaminson'.$date_today;
                
            $showAsignaMedicamentoTmp = DB::table('asig_med_tempo')
            ->where('asig_med_tempo.datosbasicos_id','=',$request->dato_id)
            ->where("asig_med_tempo.anulado", "=", NULL)
            ->join('inv_articulos', 'asig_med_tempo.articulos_id','=','inv_articulos.id')
            ->join('inv_unimedidas', 'asig_med_tempo.unimedida_id','=','inv_unimedidas.id')
            ->join('tipo_admin_med_user', 'asig_med_tempo.tipoadmin_med_id','=','tipo_admin_med_user.id')
            ->join('medicos_externos', 'asig_med_tempo.personalexterno_id','=','medicos_externos.id')
            ->select('asig_med_tempo.id','asig_med_tempo.datosbasicos_id','asig_med_tempo.articulos_id',
            'asig_med_tempo.fecha_inicio','asig_med_tempo.hora', 'asig_med_tempo.dosis','asig_med_tempo.fecha_fin',
            'asig_med_tempo.pososlogia_t','asig_med_tempo.pososlogia_h_d', 'asig_med_tempo.unimedida_id', 
            'asig_med_tempo.tipoadmin_med_id','asig_med_tempo.indicaciones','asig_med_tempo.personalexterno_id',
            'inv_articulos.descripcion as medicamento','asig_med_tempo.duracion_dias','asig_med_tempo.dx',
            'tipo_admin_med_user.descripcion as via_admin','inv_unimedidas.descripcion as medida')
            ->get(); 
            return $showAsignaMedicamentoTmp;
            
            // DB::raw('CONCAT(medicos_externos.nombre," ",medicos_externos.apellidos) as profesional'), 
    }       
   
    public function edit(AsigMediTempoModel $asigMediTempoModel)
    {
        //
    }

   
    public function update(Request $request, AsigMediTempoModel $asigMediTempoModel)
    {
        // try {
        //     DB::beginTransaction();
                $idCli = $request['idAsignaMedica'];
                $epsUpdate = AsigMediTempoModel::findOrFail($idCli);
                $epsUpdate->fill($request->all());
                $epsUpdate->save();  
            DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return response()->json(['message' => 'Error']);
        // }
        // return response()->json(['message' => 'Success']);        
            return $epsUpdate;           
    }

   
    public function destroy(AsigMediTempoModel $asigMediTempoModel)
    {
        //
    }
}
