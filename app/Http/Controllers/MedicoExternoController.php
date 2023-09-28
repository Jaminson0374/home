<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\AcompanantesModel;
use App\Models\backend\TipoDocumentoModell;
use App\Models\EspecialidadesModel;
use App\Models\SexoModell;
use App\Models\MedicoExternoModel;
use Illuminate\Http\Request;

class MedicoExternoController extends Controller
{
    public function index()
    {
        $indexFamiliar = DB::table('medicos_externos')
        ->select('id','nombre','apellidos','organizacion','telefonos','especialidad')
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.profesionl_externo.admin-medico_externo',compact('indexFamiliar')); 
    }

   
    public function create($idUserFamily)
    {
        $createFamily = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserFamily)->get();
        $tipoDocFami = TipoDocumentoModell::all(); // se guarda la consulta en la bariable $tipodocBasic
        $generoFamiliar = SexoModell::all();
        $especialidad = EspecialidadesModel::all();

        return view('backend.profesionl_externo.add-medico_externo',compact('tipoDocFami','generoFamiliar', 'createFamily','especialidad'));   
    }

  
    public function store(Request $request)
    {
         
        try {
            DB::beginTransaction();   
            $StoreFamiliares = MedicoExternoModel::updateOrCreate(
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

   
    public function show(Request $request, MedicoExternoModel $MedicoExternoModel)
    {
        // return $request;
        $showFamiliares = DB::table('medicos_externos')
        ->where('datosbasicos_id','=',$request->datosbasicos_id)
        ->where("anulado", "=", NULL)
        ->select('id','telefonos','sexo_id', 'tipodocumento_id','num_documento','direccion_res','email','tipo_acompanante','observacion',
        DB::raw('CONCAT(nombre, " ", apellidos) as familiar'), 'parentezco', 'nombre',  'apellidos')->get(); 
        return $showFamiliares;         
    }

    public function validaDoc(Request $request,   MedicoExternoModel $MedicoExternoModel)
    {   
        // return $request->data['num_documento'];
        $valiDoc = DB::table('medicos_externos')
        ->where('num_documento','=',$request->data['num_documento'])
        ->where("anulado", "=", NULL)
        ->select('num_documento')->get();
        return $valiDoc;
       }

    public function destroy(Request $request,  MedicoExternoModel $MedicoExternoModel)
    {
        try {
            DB::beginTransaction();
                $idCliAnula=$request->data['id'];
                $EvolAnula = MedicoExternoModel::findOrFail($idCliAnula);
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
