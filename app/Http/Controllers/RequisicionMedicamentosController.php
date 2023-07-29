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
        // $requisicionesMedic = DB::table('requisicion_medicamento')
        // ->join('cliente_datosbasicos', 'requisicion_medicamento.datosbasicos_id','=','cliente_datosbasicos.id')
        // ->join('inv_articulos', 'requisicion_medicamento.articulos_id ','=','inv_articulos.id')
        // ->join('empleados', 'requisicion_medicamento.empleado_id','=','empleados.id')
        // ->join('inv_unimedidas', 'requisicion_medicamento.unimedidas_id','=','inv_unimedidas.id')
        // ->select('cliente_datosbasicos.id','cliente_datosbasicos.nombre','cliente_datosbasicos.apellidos',
        // 'inv_articulo.id','inv_articulo.descripcion', 'empleados.id','empleados.nombre','empleados.apellidos',
        // 'inv_unimedidas.id', 'inv_unimedidas.descripcion')->get(); 

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

       return view('backend.inventario.requisicion_create', compact('requi_articulos','requi_unimedida','requi_empleados','requi_dtobasico','rqui_ccosto','requi_consecutivos'));
        

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

                $newConse = $request->consecutivo+1;
                $idDtBasicoConse =  ConsecutivosModel::find($request->codigo_conse);
                $idDtBasicoConse->consecutivo = $newConse;
                $idDtBasicoConse->save();                
                
                // $clienteEvolMedic = EvolucionDiariaModel::create($request->all()); 
                
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return $clienteEvolMedic;  
            // return $clienteServi2;  
            return response()->json(['message' => 'Success']);
    
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
