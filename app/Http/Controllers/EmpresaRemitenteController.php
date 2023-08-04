<?php

namespace App\Http\Controllers;

use App\Models\EmpresaRemitenteModell;
use App\Models\RangoEpsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaRemitenteController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $rangoEps = RangoEpsModel::all();

        return view('backend.tablas_auxiliares.eps', compact(['rangoEps']));
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction(); 
             
            $epsSave = EmpresaRemitenteModell::create($request->all());
            // return $epsSave;
            
            DB::commit();
            } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);         
    }

 
    public function show(EmpresaRemitenteModell $empresaRemitenteModell)
    {
        $epsShow = DB::table('empresa_remite')
        ->join('rango_eps', 'empresa_remite.rango_eps_id','=','rango_eps.id')
         ->select('empresa_remite.id','empresa_remite.num_documento','empresa_remite.nombre_eps','empresa_remite.telefono_eps',
         'empresa_remite.direccion_eps','empresa_remite.nombre_repre','empresa_remite.telefono_repre','empresa_remite.observacion',
         'empresa_remite.fecha_ini_contrato','rango_eps.descripcion','empresa_remite.rango_eps_id')->get();
         return $epsShow;

    }
    public function anularRegistroEps(Request $request, EmpresaRemitenteModell $EmpresaRemitenteModell)
    {
            // return $request->all();
            // return $request['eps_id'];
            try {
                DB::beginTransaction();
                $idCliAnula=$request['eps_id'];
                $EvolAnula = EmpresaRemitenteModell::findOrFail($idCliAnula);
                $EvolAnula->anulado = "S";
                $EvolAnula->save();  
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
            // return $EvolAnula;
    }
 
    public function edit(EmpresaRemitenteModell $empresaRemitenteModell)
    {
        //
    }

    public function update(Request $request, EmpresaRemitenteModell $empresaRemitenteModell)
    {
        try {
            DB::beginTransaction();
                $idCli=$request['eps_id'];
                $epsUpdate = EmpresaRemitenteModell::findOrFail($idCli);
                $epsUpdate->fill($request->all());
                $epsUpdate->save();  
                return $epsUpdate;    
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);                       
    }

     public function destroy(Request $request, EmpresaRemitenteModell $empresaRemitenteModell)
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
