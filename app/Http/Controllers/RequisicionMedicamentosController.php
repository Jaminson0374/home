<?php

namespace App\Http\Controllers;

use App\Models\RequisicionMedicamentodsModel;
use App\Models\EmpleadosModell;
use App\Models\InvArticulosModel;
use App\Models\InvUniMedidasModel;
use App\Models\Cliente_datosbasico;
use App\Models\InvCcostosModel;
use App\Models\ConsecutivosModel;
use Egulias\EmailValidator\Result\Reason\ConsecutiveAt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequisicionMedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $requi_datosbasicos = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad', 'ult_fecha_requisicion')
        ->where("estado_user", "=", "ON")->get(); 

         return view('backend.inventario.requisiciones_index',compact('requi_datosbasicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idUserBasico)
    {
        $requi_articulos = DB::table('inv_articulos')->select('id','referencia','descripcion')
                            ->where('categoria_id',1)->get(); //la categoría 1, siempre debe ser medicamentos
        $requi_unimedida = InvUniMedidasModel::all();
        $requi_empleados = DB::table('empleados')->select('id','nombre','apellidos')
                            ->where('categoria_id',2)->get(); //la categoría 2, siempre debe ser medicos, enfermero(a)s
        $requi_dtobasico = DB::table('cliente_datosbasicos')->select('id','num_documento','nombre','apellidos')->where('id','=',$idUserBasico)->get();
        $rqui_ccosto = InvCcostosModel::all();
        $requi_consecutivos = ConsecutivosModel::where('codigo','=','0001')->get(); //Este es el codigo para el consecutivo de las requisiciones 
        // return $requi_consecutivos;

        $requisicionesMedic = DB::table('requisicion_medicamento')->where('requisicion_medicamento.datosbasicos_id','=', $idUserBasico)
        ->join('cliente_datosbasicos', 'requisicion_medicamento.datosbasicos_id','=','cliente_datosbasicos.id')
        ->join('inv_articulos', 'requisicion_medicamento.articulos_id','=','inv_articulos.id')
        ->join('empleados', 'requisicion_medicamento.empleados_id','=','empleados.id')
        ->join('inv_unimedidas', 'requisicion_medicamento.unimedidas_id','=','inv_unimedidas.id')
        ->select('requisicion_medicamento.fecha_requisicion', 'requisicion_medicamento.consecutivo',
        'requisicion_medicamento.articulos_id', 'inv_articulos.descripcion AS medicamento',
        'requisicion_medicamento.cantidad', 'requisicion_medicamento.unimedidas_id',
        'inv_unimedidas.descripcion as descrip_medidas',
        'requisicion_medicamento.empleados_id', DB::raw('CONCAT(empleados.nombre," ",empleados.apellidos) as entregador'),
        'requisicion_medicamento.datosbasicos_id', DB::raw('CONCAT(cliente_datosbasicos.nombre," ",cliente_datosbasicos.apellidos) as usuario'),
        'inv_unimedidas.descripcion AS unimedidas', 'cliente_datosbasicos.apellidos')->get(); 

        // return $requisicionesMedic;
        return view('backend.inventario.requisicion_create', compact('requi_articulos','requi_unimedida','requi_empleados','requi_dtobasico','rqui_ccosto','requi_consecutivos','requisicionesMedic'));
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction(); 
              
                $idDtBasicoRq =  Cliente_datosbasico::find($request->datosbasicos_id);
                $idDtBasicoRq->ult_fecha_requisicion = $request->fecha_requisicion;
                $idDtBasicoRq->save();

                $idDtBasicoConse =  ConsecutivosModel::find($request->codigo_conse);
                $idDtBasicoConse->consecutivo = $request->consecutivo;
                $idDtBasicoConse->save();                
                
                $requi_storeReg = RequisicionMedicamentodsModel::create($request->all()); 
                
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            // return response()->json(['message' => 'Success']);
            // return $requi_storeReg->id;
            $requisicionesBrows = DB::table('requisicion_medicamento')->where('requisicion_medicamento.id','=', $requi_storeReg->id)
            ->join('cliente_datosbasicos', 'requisicion_medicamento.datosbasicos_id','=','cliente_datosbasicos.id')
            ->join('inv_articulos', 'requisicion_medicamento.articulos_id','=','inv_articulos.id')
            ->join('empleados', 'requisicion_medicamento.empleados_id','=','empleados.id')
            ->join('inv_unimedidas', 'requisicion_medicamento.unimedidas_id','=','inv_unimedidas.id')
            ->select('requisicion_medicamento.fecha_requisicion', 'requisicion_medicamento.consecutivo',
            'requisicion_medicamento.articulos_id', 'inv_articulos.descripcion AS medicamento',
            'requisicion_medicamento.cantidad', 'requisicion_medicamento.unimedidas_id',
            'inv_unimedidas.descripcion as descrip_medidas',
            'requisicion_medicamento.empleados_id', DB::raw('CONCAT(empleados.nombre," ",empleados.apellidos) as entregador'),
            'requisicion_medicamento.datosbasicos_id', DB::raw('CONCAT(cliente_datosbasicos.nombre," ",cliente_datosbasicos.apellidos) as usuario'),
            'inv_unimedidas.descripcion AS unimedidas', 'cliente_datosbasicos.apellidos','requisicion_medicamento.id',
            'requisicion_medicamento.ccosto_id', 'requisicion_medicamento.fecha_vencimiento',
            'requisicion_medicamento.existencia_hasta', 'requisicion_medicamento.lote')->get(); 
            return $requisicionesBrows;  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequisicionMedicamentodsModel  $requisicionMedicamentodsModel
     * @return \Illuminate\Http\Response
     */
    public function show(RequisicionMedicamentodsModel $requisicionMedicamentodsModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequisicionMedicamentodsModel  $requisicionMedicamentodsModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RequisicionMedicamentodsModel $requisicionMedicamentodsModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequisicionMedicamentodsModel  $requisicionMedicamentodsModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisicionMedicamentodsModel $requisicionMedicamentodsModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequisicionMedicamentodsModel  $requisicionMedicamentodsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequisicionMedicamentodsModel $requisicionMedicamentodsModel)
    {
        //
    }
}
