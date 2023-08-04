<?php

namespace App\Http\Controllers;

use App\Models\InvCategoriasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvCategoriasController extends Controller
{
    public function index()
    {
        //
    }

    public function create() 
    {
        // $invCategoria = InvCategoriasModel::all();

        return view('backend.tablas_auxiliares.inv_categorias');
    }


    public function store(Request $request)
    {
        // return $request->all();
        try {
            DB::beginTransaction(); 
                $carSve = InvCategoriasModel::create($request->all());
                // return $carSve;
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
            return response()->json(['message' => 'Success']);         
    }

 
    public function show(InvCategoriasModel $invCategoriasModel)
    {
          $catShow = DB::table('inv_categorias')->where('anulado','=',NULL)
         ->select('inv_categorias.id','inv_categorias.codigo','inv_categorias.descripcion','inv_categorias.abreviatura')->get();
         return $catShow;

    }
    public function anularRegistroCat(Request $request, InvCategoriasModel $invCategoriasModel)
    {
            // return $request->all();
            // return $request['eps_id'];
            try {
                DB::beginTransaction();
                    $idCliAnula=$request['cat_id'];
                    $EvolAnula = InvCategoriasModel::findOrFail($idCliAnula);
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
 
    public function edit(InvCategoriasModel $invCategoriasModel)
    {
        //
    }

    public function update(Request $request, InvCategoriasModel $invCategoriasModel)
    {
        try {
            DB::beginTransaction();
                $idCli=$request['cat_id'];
                $epsUpdate = InvCategoriasModel::findOrFail($idCli);
                $epsUpdate->fill($request->all());
                $epsUpdate->save();  
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);        
            // return $epsUpdate;           
        }

     public function destroy(InvCategoriasModel $invCategoriasModel)
    {
        //
    }
}
