<?php

namespace App\Http\Controllers;

use App\Models\VisitaProfesionalesModel;
use App\Models\EmpleadosModell;
use APP\Models\Cliente_datosbasico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitaProfesionalesController extends Controller
{
  
    public function index()
    {
        $clientesVisitasPro = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','estado_user','ultima_visita_pro')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.controles_medicos.visitas_medicas_pro.admin_visitas_pro',compact('clientesVisitasPro'));  
    }

 
    public function create($idUserVisita)
    {
    //     $medicamentos = DB::table('inv_articulos')->select('id','referencia','descripcion')
    //     ->where('categoria_id',1)->get(); //la categoría 1, siempre debe ser medicamentos
        // return $medicamentos;

        $dtobasicoVisitas = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserVisita)->get();
        $empleadosVisitas = EmpleadosModell::all();
        // tipoViaAdmin
        return view('backend.controles_medicos.visitas_medicas_pro.add_visitas_pro', compact('dtobasicoVisitas','empleadosVisitas'));        
    }

       public function store(Request $request)
    {
        //
    }

 
    public function show(VisitaProfesionalesModel $visitaProfesionalesModel)
    {
        //
    }

      public function edit(VisitaProfesionalesModel $visitaProfesionalesModel)
    {
        //
    }

     public function update(Request $request, VisitaProfesionalesModel $visitaProfesionalesModel)
    {
        //
    }

     public function destroy(VisitaProfesionalesModel $visitaProfesionalesModel)
    {
        //
    }
}
