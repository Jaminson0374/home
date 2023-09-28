<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\AcompanantesModel;
use App\Models\backend\TipoDocumentoModell;
use App\Models\SexoModell;
use Illuminate\Http\Request;

class AcompanantesController extends Controller
{
 
    public function index()
    {
        $indexFamiliar = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad','telefonos_user')
        ->where("estado_servicio", "=", "ON") 
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.acompanantes.admin-familia',compact('indexFamiliar')); 
    }

   
    public function create($idUserFamily)
    {
        $createFamily = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserFamily)->get();
        $tipoDocFami = TipoDocumentoModell::all(); // se guarda la consulta en la bariable $tipodocBasic
        $generoFamiliar = SexoModell::all();

        return view('backend.acompanantes.add-familiares',compact('tipoDocFami','generoFamiliar', 'createFamily'));   
    }

  
    public function store(Request $request)
    {
         
        try {
            DB::beginTransaction();   
            $StoreFamiliares = AcompanantesModel::updateOrCreate(
                ['id' => $request->data['id']],
                ['tipodocumento_id'=>$request->data['tipodocumento_id'], 
                'num_documento'=>$request->data['num_documento'], 
                'nombre'=>$request->data['nombre'], 
                'apellidos'=>$request->data['apellidos'], 
                'telefonos'=>$request->data['telefonos'], 
                'email'=>$request->data['email'], 
                'direccion_res'=>$request->data['direccion_res'], 
                'sexo_id'=>$request->data['sexo_id'], 
                'parentezco'=>$request->data['parentezco'], 
                'tipo_acompanante'=>$request->data['tipo_acompanante'], 
                'observacion'=>$request->data['observacion'],
                'datosbasicos_id' => $request->data['datosbasicos_id']]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);
                // return $StoreFamiliares;          
    }

   
    public function show(Request $request, AcompanantesModel $acompanantesModel)
    {
        // return $request;
        $showFamiliares = DB::table('acompanantes')
        ->where('datosbasicos_id','=',$request->datosbasicos_id)
        ->where("anulado", "=", NULL)
        ->select('id','telefonos','sexo_id', 'tipodocumento_id','num_documento','direccion_res','email','tipo_acompanante','observacion',
        DB::raw('CONCAT(nombre, " ", apellidos) as familiar'), 'parentezco', 'nombre',  'apellidos')->get(); 
        return $showFamiliares;         
    }

    public function validaDoc(Request $request,   AcompanantesModel $acompanantesModel)
    {   
        // return $request->data['num_documento'];
        $valiDoc = DB::table('acompanantes')
        ->where('num_documento','=',$request->data['num_documento'])
        ->where("anulado", "=", NULL)
        ->select('num_documento')->get();
        return $valiDoc;
       }

    public function destroy(Request $request,  AcompanantesModel $acompanantesModel)
    {
        try {
            DB::beginTransaction();
            $idCliAnula=$request->data['id'];
            $EvolAnula = AcompanantesModel::findOrFail($idCliAnula);
            $EvolAnula->anulado = "S";
            $EvolAnula->save();  
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);
    }
}
