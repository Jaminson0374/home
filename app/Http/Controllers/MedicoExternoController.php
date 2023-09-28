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
        ->select('id','nombre','apellidos','doc_identidad', 'organizacion','telefonos','especialidad_id')
        ->where("anulado", "=", NULL)
        ->get();
         return view('backend.profesional_externo.admin-medico_externo',compact('indexFamiliar')); 
    }

   
    public function create($idUserFamily)
    {
        $createFamily = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos','edad')->where('id','=',$idUserFamily)->get();
        $tipoDocFami = TipoDocumentoModell::all(); // se guarda la consulta en la bariable $tipodocBasic
        $generoFamiliar = SexoModell::all();
        $especialidad = EspecialidadesModel::all();

        return view('backend.profesional_externo.add-medico_externo',compact('tipoDocFami','generoFamiliar', 'createFamily','especialidad'));   
    }

  
    public function store(Request $request)
    {
         
        try {
            DB::beginTransaction();   
            $StoreFamiliares = MedicoExternoModel::updateOrCreate(
                ['id' => $request->data['id']],
                ['tipodocumento_id'=>$request->data['tipodocumento_id'], 
                'doc_identidad'=>$request->data['doc_identidad'], 
                'nombre'=>$request->data['nombre'], 
                'apellidos'=>$request->data['apellidos'], 
                'telefonos'=>$request->data['telefonos'], 
                'email'=>$request->data['email'], 
                'direccion_residencial'=>$request->data['direccion_residencial'], 
                'direccion_laboral'=>$request->data['direccion_laboral'], 
                'sexo_id'=>$request->data['sexo_id'], 
                'especialidad_id'=>$request->data['especialidad_id'], 
                'tprofesional'=>$request->data['tprofesional'], 
                'organizacion'=>$request->data['organizacion'], 
                'observacion'=>$request->data['observacion']]);
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
    function buscaExternos(){

        $clientesDtoBasic = DB::table('medicos_externos')
        ->where('anulado','=',NULL)
        ->select('id','doc_identidad','tipodocumento_id','nombre','apellidos',
                 'telefonos','sexo_id',
                 'especialidad_id', 'direccion_residencial', 'direccion_residencial','direccion_laboral',
                 'email','tprofesional','organizacion','observacion')->get();
                // DB::raw('CONCAT(nombre, " ", apellidos as profesional)')
	
        // $clientesBasic  = Clientes::where('estado','=','on')->get();
       
        return $clientesDtoBasic;        
    } 
}
