<?php

namespace App\Http\Controllers;

use App\Models\DatosAuxiliaresModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosAuxiliaresCobtroller extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosAuxi = DatosAuxiliaresModel::all();
 
        // return $empleadoIndex;
        return view('backend.tablas_auxiliares.AAdatos_auxiliares_index',compact(['datosAuxi']));     
    }
    

    public function create()
    {
 //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(DatosAuxiliaresModel $datosAuxiliaresModel)
    {
        //
    }


    public function edit(DatosAuxiliaresModel $datosAuxiliaresModel)
    {
        //
    }


    public function update(Request $request, DatosAuxiliaresModel $datosAuxiliaresModel)
    {
        //
    }


    public function destroy(DatosAuxiliaresModel $datosAuxiliaresModel)
    {
        //
    }
}
