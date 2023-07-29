<?php

namespace App\Http\Controllers;

use App\Models\InvArticulosModel;
use App\Models\InvCategoriasModel;
use App\Models\InvCcostosModel;
use App\Models\InvConceptosModel;
use App\Models\InvDocumentosModel;
use App\Models\InvLineasModel;
use App\Models\InvProveedoresModel;
use App\Models\InvUniMedidasModel;
use Illuminate\Http\Request;

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
        //
    }


    public function show(InvArticulosModel $invArticulosModel)
    {
        //
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
    public function destroy(InvArticulosModel $invArticulosModel)
    {
        //
    }
}
