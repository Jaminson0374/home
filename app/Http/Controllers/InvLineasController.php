<?php

namespace App\Http\Controllers;

use App\Models\InvLineasModel;
use App\Models\InvCategoriasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvLineasController extends Controller
{
    public function index()
    {
        //
    }

    public function create() 
    {
        $invCategoria = InvCategoriasModel::all();

        return view('backend.tablas_auxiliares.inv_lineas', compact(['invCategoria']));
    }

    public function store(Request $request)
    {
        // return $request->all();
        try {
            DB::beginTransaction(); 
                $carSve = InvLineasModel::create($request->all());
                // return $carSve;
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
            return response()->json(['message' => 'Success']);         
    }

 
    public function show(InvLineasModel $invLineasModel)
    {
          $catShow = DB::table('inv_lineas')->where('anulado','=',NULL)
         ->join('inv_categorias','inv_lineas.categoria_id','=','inv_categorias.id')
         ->select('inv_lineas.id','inv_lineas.codigo','inv_categorias.descripcion as categoria',
         'inv_lineas.abreviatura', 'inv_lineas.descripcion as linea')->get();
         return $catShow;

    }
    public function anularRegistroLin(Request $request, InvLineasModel $invLineasModel)
    {
            // return $request->all();
            // return $request['eps_id'];
            try {
                DB::beginTransaction();
                    $idCliAnula=$request['lin_id'];
                    $EvolAnula = InvLineasModel::findOrFail($idCliAnula);
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
 
    public function edit(InvLineasModel $invLineasModel)
    {
        //
    }

    public function update(Request $request, InvLineasModel $invLineasModel)
    {
        try {
            DB::beginTransaction();
                $idCli=$request['lin_id'];
                $epsUpdate = InvLineasModel::findOrFail($idCli);
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

     public function destroy(InvLineasModel $invLineasModel)
    {
        //
    }    


}
