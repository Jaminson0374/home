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
// use DateTime();

// date_default_timezone_set("America/Bogota");


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
        return view('backend.controles_medicos.administra_medicamentos.asignar_medicamentos', compact('medicamentos','dtobasicoMed','tipoViaAdmin','uniMedId', 'medicamentos'));
    }


    public function store(Request $request)
    {
            
          try {
            DB::beginTransaction();        
 
            
            $AdminMedicamentos = AsignaMedicamentosModel::create($request->all()); 
            // return $AdminMedicamentos;

            // $AdminMedicamentos = AsignaMedicamentosModel::updateOrCreate(
            //     ['id' => $request->id],
            //     ['datosbasicos_id' => $request->datosbasicos_id,
            //     'fecha_inicio' => $request->fecha_ingerir,
            //     'horadbf' => $request->horadbf,
            //     'dosis' => $request->dosis,
            //     'pososlogia_t' => $request->pososlogia_t,
            //     'pososlogia_h_d' => $request->pososlogia_h_d,
            //     'unimedida_id' => $request->unimedida_id,
            //     'unimedida_id' => $request->unimedida_id,
            //     'tipoadmin_med_id' => $request->tipoadmin_med_id,
            //     'indicaciones' => $request->indicaciones,
            //     'user_id' => $request->user_id
            // ]);

            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
    }


    public function buscar_asig(Request $request, AsignaMedicamentosModel $asignaMedicamentosModel)
    {
            //  return 'jaminson'.$request->dato_id;
            // return 'jaminson'.$request->fecha_ingerir;
            // ->where('administra_med_permanentes.fecha_ingerir','=',$date_today)
            // $date_today = date("Y-m-d", strtotime($request->fecha_ingerir));
            // return 'jaminson'.$date_today;
                
                $showAsignaMedicamento = DB::table('asigna_medicamentos')
                ->where('asigna_medicamentos.datosbasicos_id','=',$request->dato_id)
                ->join('inv_articulos', 'asigna_medicamentos.articulos_id','=','inv_articulos.id')
                ->join('inv_unimedidas', 'asigna_medicamentos.unimedida_id','=','inv_unimedidas.id')
                ->join('tipo_admin_med_user', 'asigna_medicamentos.tipoadmin_med_id','=','tipo_admin_med_user.id')
                ->select('asigna_medicamentos.id','asigna_medicamentos.datosbasicos_id','asigna_medicamentos.articulos_id',
                'asigna_medicamentos.fecha_inicio','asigna_medicamentos.horadbf', 'asigna_medicamentos.dosis',
                'asigna_medicamentos.pososlogia_t','asigna_medicamentos.pososlogia_h_d', 'asigna_medicamentos.unimedida_id', 
                'asigna_medicamentos.tipoadmin_med_id','asigna_medicamentos.indicaciones',
                'inv_articulos.descripcion as medicamento',
                'tipo_admin_med_user.descripcion as via_admin','inv_unimedidas.descripcion as medida')
                ->get(); 
                return $showAsignaMedicamento;
                // 
            
    }


    public function show(Request $request, AsignaMedicamentosModel $asignaMedicamentosModel)
    {
            //  return 'jaminson'.$request->dato_id;
            // return 'jaminson'.$request->fecha_ingerir;
            // ->where('administra_med_permanentes.fecha_ingerir','=',$date_today)
            $date_today = date("Y-m-d", strtotime($request->fecha_ingerir));
            // return 'jaminson'.$date_today;

            $adminMedicPerma = DB::table('administra_med_permanentes')->where('administra_med_permanentes.datosbasicos_id','=',$request->dato_id)
            ->where('administra_med_permanentes.fecha_ingerir','=',$date_today)
            ->join('asigna_medicamentos', 'administra_med_permanentes.asignamed_id','=','asigna_medicamentos.id')
            ->join('inv_articulos', 'asigna_medicamentos.articulos_id','=','inv_articulos.id')
            ->join('inv_unimedidas', 'asigna_medicamentos.unimedida_id','=','inv_unimedidas.id')
            ->join('tipo_admin_med_user', 'asigna_medicamentos.tipoadmin_med_id','=','tipo_admin_med_user.id')
            ->select('administra_med_permanentes.id','administra_med_permanentes.asignamed_id','administra_med_permanentes.asignamed_id','asigna_medicamentos.id as asig_id',
            'administra_med_permanentes.fecha_ingerir','asigna_medicamentos.horadbf', 'asigna_medicamentos.dosis',
            'asigna_medicamentos.pososlogia_t','asigna_medicamentos.pososlogia_h_d', 
            'asigna_medicamentos.tipoadmin_med_id','administra_med_permanentes.indicaciones','asigna_medicamentos.articulos_id',
            'inv_articulos.descripcion as medicamento','inv_articulos.descripcion as medi','administra_med_permanentes.ok',
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
                'asigna_medicamentos.id as asignamed_id', 'asigna_medicamentos.ok',
                'asigna_medicamentos.fecha_inicio','asigna_medicamentos.horadbf', 'asigna_medicamentos.dosis',
                'asigna_medicamentos.pososlogia_t','asigna_medicamentos.pososlogia_h_d', 'asigna_medicamentos.unimedida_id', 
                'asigna_medicamentos.tipoadmin_med_id','asigna_medicamentos.indicaciones',
                'inv_articulos.descripcion as medicamento','inv_articulos.descripcion as medi',
                'tipo_admin_med_user.descripcion as via_admin','inv_unimedidas.descripcion as medida')
                ->where('asigna_medicamentos.datosbasicos_id','=',$request->dato_id)->get(); 
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
                $idCli = $request['idAsignaMedica'];
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
