<?php

namespace App\Http\Controllers;

use App\Models\ConsecutivosModel;
use Illuminate\Http\Request;

class ConsecutivosController extends Controller
{

    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(ConsecutivosModel $consecutivosModel)
    {
        //
    }

    public function edit(ConsecutivosModel $consecutivosModel)
    {
        //
    }


    public function update(Request $request, ConsecutivosModel $consecutivosModel)
    {
        //
    }


    public function destroy(ConsecutivosModel $consecutivosModel)
    {
        //
    }

    public function buscaConsecutivo(Request $request){
    //  return $request->codigo;
     $conse_consecutivo = ConsecutivosModel::where('codigo','=',$request->codigo)->get(); //Este es el codigo para el consecutivo de las requisiciones 
     return $conse_consecutivo; //->consecutivo;
    }
}
