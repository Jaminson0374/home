<?php

namespace App\Http\Controllers;

use App\Models\SeguimtoTerapiaModel;
use App\Models\EmpleadosModell;
use App\Models\MedicoExternoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeguimtoTerapiaController extends Controller
{

    public function index()
    {
        $indexSeguiTerapia = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','estado_user','ult_seguimto_terapia')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.controles_medicos.seguimiento_terapia.admin_segui_terapia',compact('indexSeguiTerapia'));  
    }

 
    public function create($idUserVisita)
    {
        $createSeguiTerapia = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserVisita)->get();
        $empleadosSeguiTerapia = EmpleadosModell::all();
        $personalExternoTerapia = MedicoExternoModel::all();
        // tipoViaAdmin
        return view('backend.controles_medicos.seguimiento_terapia.add_segui_terapia', compact('createSeguiTerapia','empleadosSeguiTerapia','personalExternoTerapia'));        
    }


    public function store(Request $request)
    {
        //
    }

 
    public function show(SeguimtoTerapiaModel $seguimtoTerapiaModel)
    {
        //
    }

     public function edit(SeguimtoTerapiaModel $seguimtoTerapiaModel)
    {
        //
    }

    public function update(Request $request, SeguimtoTerapiaModel $seguimtoTerapiaModel)
    {
        //
    }

     public function destroy(SeguimtoTerapiaModel $seguimtoTerapiaModel)
    {
        //
    }
}
