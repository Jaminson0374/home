<?php

namespace App\Http\Controllers;

use App\Models\backend\TipoDocumentoModell;
use App\Models\EmpleadosModell;
use App\Models\ProfesionesModell;
use App\Models\Tipo_contratoModell;
use App\Models\CiudadesModell;
use App\Models\DepartamentosModell;
use App\Models\GrpSangreModell;
use App\Models\PaisModell;
use App\Models\SexoModell;
use App\Models\CargosModell;
use App\Models\TipoDocumentoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{

    public function index()
    {
        $empleadoIndex = DB::table('empleados')->where('empleados.anulado','=',NULL)
        ->join('sexo', 'empleados.sexo_id','=','sexo.id')
        ->join('tipo_documentos', 'empleados.tipodocumento_id','=','tipo_documentos.id')
        ->join('cargos', 'empleados.cargo_id', '=','cargos.id')
        ->select('empleados.id','empleados.nombre',
        'tipo_documentos.descripcion as tipo_doc', 'empleados.num_documento', 'cargos.descripcion as cargo',
        'empleados.edad','empleados.telefonos','sexo.descripcion as sexo')->get();
        // DB::raw('CONCAT(empleados.nombre," ",empleados.apellidos) as empleado'),
        $sinRegistro=true;
        if($empleadoIndex){
            $sinRegistro=true;
        }else{
            $sinRegistro=false;
        }

        // return $empleadoIndex;
        return view('backend.empleados.empleados_index',compact(['empleadoIndex','sinRegistro']));
    }


    public function create()
    {
            //lo traigo de datos basicos como apoyo
           $tipoDocu = TipoDocumentoModell::all();    
           $pais = PaisModell::all();
           $departamento = DepartamentosModell::all();
           $ciudad = CiudadesModell::all();
           $genero = SexoModell::all();
           $grupo_rh= GrpSangreModell::all();
           $cargos = CargosModell::all();
           $profesionEmp = ProfesionesModell::all();
           $tipoCargoEmp = Tipo_contratoModell::all();
           $tablaAuxiliar ='/buscarEmple';

           return view('backend.empleados.empleados_create',Compact(['tipoDocu', 'pais', 
           'departamento','ciudad','genero', 'grupo_rh','cargos','profesionEmp','tipoCargoEmp', 'tablaAuxiliar']));
    }


    public function store(Request $request, EmpleadosModell $empleadosModell)
    {
        try {
                DB::beginTransaction(); 
                 
                $empleadoSave = EmpleadosModell::create($request->all());
                // return $empleadoSave; 
                
                DB::commit();
                } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
                }
                return response()->json(['message' => 'Success']);            
    }

 
    public function show(EmpleadosModell $empleadosModell)
    {
        $empleadoIndex = DB::table('empleados')->where('empleados.anulado','=',NULL)
        ->join('sexo', 'empleados.sexo_id','=','sexo.id')
        ->join('tipo_documentos', 'empleados.tipodocumento_id','=','tipo_documentos.id')
        ->join('cargos', 'empleados.cargo_id', '=','cargos.id')
        ->join('grp_sangre', 'empleados.gruposanguineo_id', '=','grp_sangre.id')
        ->join('profesiones', 'empleados.profesion_id', '=','profesiones.id')
        ->join('tipo_contrato', 'empleados.tipocontrato_id', '=','tipo_contrato.id')
        ->select('empleados.id','empleados.nombre','empleados.apellidos',
        'empleados.tipodocumento_id', 'tipo_documentos.descripcion as tipo_doc', 'empleados.num_documento','empleados.cargo_id',
        'cargos.descripcion as cargo', 'empleados.sexo_id', 'sexo.descripcion as sexo', 'empleados.edad','empleados.telefonos',
         'empleados.gruposanguineo_id', 'empleados.direccion_res', 'empleados.email', 'empleados.fecha_nacimiento', 
         'empleados.lugar_ncmto','empleados.funciones','empleados.profesion_id','empleados.tipocontrato_id','empleados.salario',
         'empleados.nombre_familiar','empleados.telefono_familiar', 'empleados.email_famliar','empleados.parentezco_familiar',
         'empleados.observacion','empleados.fecha_inicio',)->where('empleados.anulado','=',NULL)->get();
         return $empleadoIndex;

     }

    public function edit(EmpleadosModell $empleadosModell)
    {
        //
    }

 
    public function update(Request $request, EmpleadosModell $empleadosModell)
    {

        try {
            DB::beginTransaction(); 
            $idCli=$request['empleado_id'];
            $cliente_datosbasico = EmpleadosModell::findOrFail($idCli);
            $cliente_datosbasico->fill($request->all());
            $cliente_datosbasico->save();  
            // return $cliente_datosbasico;                    
             
            DB::commit();
            } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);   
    }


    public function destroy(Request $request, EmpleadosModell $empleadosModell)
    {
           // return $request['idEvolucion'];

           try {
            DB::beginTransaction();
            $idCliAnula=$request['idEvolucion'];
            $EvolAnula = EmpleadosModell::findOrFail($idCliAnula);
            $EvolAnula->anulado = "S";
            $EvolAnula->save();  
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);
    }
    public function busquedaEmpleado(){
        // ->where('evolucion_diaria.anulado','=','')
        $browsEmp = DB::table('empleados')->select('nombre','apellidos')->get();
            
        return $browsEmp;         
    }    
    public function validaDocEmpleado(Request $request, EmpleadosModell $empleadosModell){
       
    //    return $request['num_documento'];
       $selectCliBco  = EmpleadosModell::where('num_documento','=',$request['num_documento'])->get();
        // $idDtBasico =  EmpleadosModell::find($request['num_documento']);
     $size = count($selectCliBco);
    if($size >= 1){     
        return response()->json(['message' => 'Success']);
    }else{
        return response()->json(['message' => 'Error']);
        }    
    }
}
