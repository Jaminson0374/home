<?php

namespace App\Http\Controllers;

use App\Models\InvArticulosModel;
use App\Models\InvCategoriasModel;
use App\Models\InvCcostosModel;
use App\Models\InvConceptosModel;
use App\Models\InvDocumentosModel;
use App\Models\InvInventariosModel;
use App\Models\InvLineasModel;
use App\Models\InvProveedoresModel;
use App\Models\InvUniMedidasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvArticulosController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Request $request, InvArticulosModel $invArticulosModel)
    {
        // $idcli="1";
        $seleUsuario =  InvArticulosModel::all();
        // return $seleUsuario;

        $_categoriasInv = InvCategoriasModel::all();
        $_ccostoId = InvCcostosModel::all();
        $_proveedorId = InvProveedoresModel::all();
        $_uniMedId = InvUniMedidasModel::all();
        $_linasId = InvLineasModel::all(); 
 
        return view('backend.inventario.articulos', compact(['_categoriasInv','_ccostoId', '_proveedorId', '_uniMedId', '_linasId']));
        
    }
    public function store(Request $request)
    {
       
        try {
            DB::beginTransaction();        
            // $idDtBasico =  Cliente_datosbasico::find($request->datosbasicos_id);
            // $idDtBasico->ult_fecha_admin_med = $request->fecha;
            // $idDtBasico->ult_hora_admin_med  = $request->hora;
            // $idDtBasico->save();
            
            $invArticuloSave = InvInventariosModel::create($request->all()); 
            return $invArticuloSave;
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
    }

    // public function buscarArticulos(){
 
    // } 

    public function show(InvArticulosModel $invArticulosModel)
    {
        $anulado = ''; 
        // ->where('inv_articulos.anulado',$anulado)
        $articulosBrows = DB::table('inv_articulos')
        ->join('inv_lineas', 'inv_articulos.linea_id','=','inv_lineas.id')
        ->join('inv_categorias', 'inv_articulos.categoria_id','=','inv_categorias.id')
        ->join('inv_unimedidas', 'inv_articulos.unimedidas_id','=','inv_unimedidas.id')
        ->join('inv_proveedores', 'inv_articulos.proveedor_id','=','inv_proveedores.id')
        ->select('inv_articulos.id','inv_articulos.referencia', 'inv_articulos.descripcion AS articulo',
        'inv_articulos.existencia', 'inv_articulos.unimedidas_id',
        'inv_unimedidas.descripcion AS descrip_medidas','inv_articulos.stock_min',
         'inv_articulos.stock_max','inv_articulos.pcosto','inv_articulos.pventa',
        'inv_articulos.iva','inv_articulos.abreviatura', 'inv_articulos.cant_ajustes', 'inv_articulos.inv_inicial',
        'inv_articulos.linea_id','inv_articulos.categoria_id','inv_categorias.descripcion As categoria',
        'inv_articulos.proveedor_id','inv_proveedores.nombre','inv_articulos.anulado')->get(); 
        // ->where('inv_articulos.anulado',$anulado)
        return $articulosBrows;  
    }


    public function edit(InvArticulosModel $invArticulosModel)
    {
        //
    }

 
    public function update(Request $request, InvArticulosModel $invArticulosModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvArticulosModel  $invArticulosModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, InvArticulosModel $invArticulosModel)
    {
            // return $request['idEvolucion'];
            try {
                DB::beginTransaction();
                $idArtiAnula=$request['idArtiAnular'];
                $artiAnula = InvArticulosModel::findOrFail($idArtiAnula);
                $artiAnula->anulado = "S";
                $artiAnula->save();  
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
    }

}
