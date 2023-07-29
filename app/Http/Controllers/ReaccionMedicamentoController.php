<?php

namespace App\Http\Controllers;

use App\Models\ReaccionMedicamentoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReaccionMedicamentoController extends Controller
{

    public function index()
    {
        $clientesAdminMed = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','ult_fecha_admin_med','ult_hora_admin_med','estado_user')
        ->where("estado_user", "=", "ON")->get(); 

         return view('backend.controles_medicos.admin_control_medico',compact('clientesAdminMed'));              
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(ReaccionMedicamentoModel $reaccionMedicamentoModel)
    {
        //
    }


    public function edit(ReaccionMedicamentoModel $reaccionMedicamentoModel)
    {
        //
    }


    public function update(Request $request, ReaccionMedicamentoModel $reaccionMedicamentoModel)
    {
        //
    }


    public function destroy(ReaccionMedicamentoModel $reaccionMedicamentoModel)
    {
        //
    }
}
