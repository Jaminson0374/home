<?php

namespace App\Http\Controllers;

use App\Models\ChequeoDiarioModel;
use App\Models\EmpleadosModell;
use App\Models\Cliente_datosbasico;
use App\Models\ChequeoPlanillaModel;
use App\Models\ChequeoListaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChequeoDiarioController extends Controller
{

    public function index()
    {
        $indexChequeoTurno = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','estado_user','ult_chequeo_turno')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.controles_medicos.chequeo_entrega_turno.admin_chequeo_turno',compact('indexChequeoTurno'));        //
    }

 
    public function create($idUserChequeo)
    {
        
        $createChequeo = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserChequeo)->get();
        $empleadosChequeos = EmpleadosModell::all();

        // tipoViaAdmin
        return view('backend.controles_medicos.chequeo_entrega_turno.add_chequeo_turno', compact('createChequeo','empleadosChequeos'));      
    }

    public function store(Request $request)
    {
        //
    }

  
    public function show(ChequeoDiarioModel $chequeoDiarioModel)
    {
        //
    }

    public function busquedaChequeo(ChequeoDiarioModel $chequeoDiarioModel)
    {
        //
    }    
    
    public function busquedaListaChequeo(Request $request, ChequeoListaModel $chequeoListaModel) //Cuando se presiona el botón nuevo
    {
        $showNuevaLista = ChequeoListaModel::where("reporte_evento.anulado", "=", NULL);
        return $showNuevaLista; 
    }       
    
    public function destroy(ChequeoDiarioModel $chequeoDiarioModel)
    {
        //
    }
}
