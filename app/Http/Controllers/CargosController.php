<?php

namespace App\Http\Controllers;

use App\Models\CargosModell;
use App\Models\CategoriaEmpleadosModell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargosController extends Controller
{

    public function index()
    {
        //
    }

    public function create() 
    {
        $categoriaCargo = CategoriaEmpleadosModell::all();

        return view('backend.tablas_auxiliares.cargos', compact(['categoriaCargo']));
    }


    public function store(Request $request)
    {
        // return $request->all();
        try {
            DB::beginTransaction(); 
            // SELECT * FROM cargos WHERE anulado IS NULL OR anulado = ''; 
                $carSve = CargosModell::create($request->all());
                // return $carSve;
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
            return response()->json(['message' => 'Success']);         
    }

 
    public function show(CargosModell $cargosModell)
    {
        $anula="S";
        $carShow = DB::table('cargos')->where('anulado','=',NULL)
        ->join('categoria_empleado', 'cargos.categoria_id','=','categoria_empleado.id')
         ->select('cargos.id','cargos.descripcion as cargo','cargos.categoria_id','cargos.funciones',
         'categoria_empleado.descripcion as categoria', 'cargos.anulado')->get();
         return $carShow;

    }
    public function anularRegistroCar(Request $request, CargosModell $cargosModell)
    {
            // return $request->all();
            // return $request['eps_id'];
            try {
                DB::beginTransaction();
                    $idCliAnula=$request['car_id'];
                    $EvolAnula = CargosModell::findOrFail($idCliAnula);
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
 
    public function edit(CargosModell $cargosModell)
    {
        //
    }

    public function update(Request $request, CargosModell $cargosModell)
    {
        try {
            DB::beginTransaction();
                $idCli=$request['car_id'];
                $epsUpdate = CargosModell::findOrFail($idCli);
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

     public function destroy(CargosModell $cargosModell)
    {
        //
    }
}
