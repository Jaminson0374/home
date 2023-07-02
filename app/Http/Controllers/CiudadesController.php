<?php

namespace App\Http\Controllers;

use App\Models\CiudadesModell;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class CiudadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idPais= $request->data['paisId'];
        $idDepartamento= $request->data['dptoId'];
      //  return $idDepartamento; //$request->all();
    
       $selectCiudad  = CiudadesModell::where('departamento_id','=',$idDepartamento)->get();
       return $selectCiudad;

       // return view('backend.reservas.admin_reservas', ['listaCli' => $clienteReserva]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CiudadesModell  $ciudadesModell
     * @return \Illuminate\Http\Response
     */
    public function show(CiudadesModell $ciudadesModell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CiudadesModell  $ciudadesModell
     * @return \Illuminate\Http\Response
     */
    public function edit(CiudadesModell $ciudadesModell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CiudadesModell  $ciudadesModell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CiudadesModell $ciudadesModell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CiudadesModell  $ciudadesModell
     * @return \Illuminate\Http\Response
     */
    public function destroy(CiudadesModell $ciudadesModell)
    {
        //
    }
}
