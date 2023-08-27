<?php

namespace App\Http\Controllers;

use App\Models\AdministraMedPermanentesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministraMedPermanentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, AdministraMedPermanentesModel $AdministraMedPermanentesModel)
    {
        try {
            DB::beginTransaction(); 
        
            $numRecord =  count($request->registros);
            
            for($i=0; $i<$numRecord; $i++){
                $datos = [
                'articulos_id' => $request->registros[$i]['articulos_id'], 
                'datosbasicos_id' => $request->registros[$i]['datosbasicos_id'],
                'fecha_ingerir' => $request->registros[$i]['fecha_ingerir'],
                'hora' => $request->registros[$i]['hora'],
                'ok' => $request->registros[$i]['ok'],
                'created_at' => now(),
                'updated_at' => now()
                ];
                DB::table('administra_med_permanentes')->insert($datos);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdministraMedPermanentesModel  $administraMedPermanentesModel
     * @return \Illuminate\Http\Response
     */
    public function show(AdministraMedPermanentesModel $administraMedPermanentesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdministraMedPermanentesModel  $administraMedPermanentesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AdministraMedPermanentesModel $administraMedPermanentesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdministraMedPermanentesModel  $administraMedPermanentesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdministraMedPermanentesModel $administraMedPermanentesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdministraMedPermanentesModel  $administraMedPermanentesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdministraMedPermanentesModel $administraMedPermanentesModel)
    {
        //
    }
}
