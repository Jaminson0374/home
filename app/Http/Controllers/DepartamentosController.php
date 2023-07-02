<?php

namespace App\Http\Controllers;

use App\Models\DepartamentosModell;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $jaminson= $request->data['paisId'];
        // return $jaminson;
      
       $selectDepartamento  = DepartamentosModell::where('pais_id','=',$jaminson)->get();
       return $selectDepartamento;
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
     * @param  \App\Models\DepartamentosModell  $departamentosModell
     * @return \Illuminate\Http\Response
     */
    public function show(DepartamentosModell $departamentosModell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepartamentosModell  $departamentosModell
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartamentosModell $departamentosModell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepartamentosModell  $departamentosModell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartamentosModell $departamentosModell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepartamentosModell  $departamentosModell
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartamentosModell $departamentosModell)
    {
        //
    }
}
