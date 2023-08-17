<?php

// namespace App\Http\Controllers\backend\clientes_datos_basicos;
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\EmpresaRemitenteModell;
use App\Models\Cliente_datosbasico;
use App\Models\backend\TipoDocumentoModell;
use App\Http\Requests\InsertClientes;
use App\Models\TipoServicio;
use App\Models\CiudadesModell;
use App\Models\DepartamentosModell;
use App\Models\AcompanantesModel;
use App\Models\GrpSangreModell;
use App\Models\PaisModell;
use App\Models\SexoModell;
use App\Models\ServiciosModell;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ClientesDatosBasicosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index() 
    {
        $clientesDtoBasicAd = DB::table('cliente_datosbasicos')
        ->join('tiposervicios', 'cliente_datosbasicos.tiposervicio_id','=','tiposervicios.id')
        ->select('cliente_datosbasicos.id','cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre','cliente_datosbasicos.apellidos','cliente_datosbasicos.edad',
                 'cliente_datosbasicos.telefonos_user','tiposervicios.descripcion','cliente_datosbasicos.id_tipodoc', 'cliente_datosbasicos.nacionalidad_id',
                 'cliente_datosbasicos.departamento_id', 'cliente_datosbasicos.ciudad_id', 'cliente_datosbasicos.fecha_nacimiento',
                 'cliente_datosbasicos.sexo_id','cliente_datosbasicos.grupoSanguineo_id', 'cliente_datosbasicos.direccion_res',
                 'cliente_datosbasicos.email_user', 'cliente_datosbasicos.fecha_creacion', 'cliente_datosbasicos.estado_user', 
                 'cliente_datosbasicos.observacion', 'cliente_datosbasicos.diagnostico')->get();
        
        // $clientesBasic  = Clientes::where('estado','=','on')->get();
       
        // return $clientesDtoBasicAd;

        // $clienteReserva  = Cliente_datosbasico::where('reserva_si_no','=','SI')->get();
        return view('backend.cliente.admin-clientes',['listaCliAll' => $clientesDtoBasicAd]);
    //    return view('backend.clientes.admin-clientes');        
    } 
 
    public function busquedaClienteDtoBasico(){

    $clientesDtoBasic = DB::table('cliente_datosbasicos')->where('anulado','=',NULL)
        ->select('cliente_datosbasicos.id','cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre','cliente_datosbasicos.apellidos','cliente_datosbasicos.edad',
                 'cliente_datosbasicos.telefonos_user','cliente_datosbasicos.id_tipodoc', 'cliente_datosbasicos.nacionalidad_id',
                 'cliente_datosbasicos.departamento_id', 'cliente_datosbasicos.ciudad_id', 'cliente_datosbasicos.fecha_nacimiento',
                 'cliente_datosbasicos.sexo_id','cliente_datosbasicos.grupoSanguineo_id', 'cliente_datosbasicos.direccion_res',
                 'cliente_datosbasicos.email_user', 'cliente_datosbasicos.fecha_creacion', 'cliente_datosbasicos.fecha_retiro','cliente_datosbasicos.estado_user', 
                 'cliente_datosbasicos.observacion', 'cliente_datosbasicos.diagnostico','cliente_datosbasicos.recomendacion_med',
                 'cliente_datosbasicos.dieta_nutricio','cliente_datosbasicos.suministro_medic','cliente_datosbasicos.peso','cliente_datosbasicos.empresa_remite_id',
                 'cliente_datosbasicos.barrio_res','cliente_datosbasicos.acompanantes_id','cliente_datosbasicos.tiposervicio_id',
                 'cliente_datosbasicos.acompanantes_id2','cliente_datosbasicos.acompanantes_id3','cliente_datosbasicos.servicio_id')->get();
	
        // $clientesBasic  = Clientes::where('estado','=','on')->get();
       
        return $clientesDtoBasic;

    }
    public function create(Request $request, Cliente_datosbasico $cliente_datosbasico) //Llama a la vista para crear clientes para datos basicos del cliente
        {
           $empresaRemite = EmpresaRemitenteModell::all();
           $serviciosUser = ServiciosModell::all();
           $acompanantes = AcompanantesModel::all();
           $tipoServicio  = TipoServicio::all();
           $tipoDocBasic = TipoDocumentoModell::all(); // se guarda la consulta en la bariable $tipodocBasic
           $pais1 = PaisModell::all();
           $departamento1 = DepartamentosModell::all();
           $ciudad1 = CiudadesModell::all();
           $genero1 = SexoModell::all();
           $grupo_rh1 = GrpSangreModell::all();
        //    add_cliente_datobasico 
           return view('backend.clientes_datos_basicos.dbasicos',['tipoDoc' => $tipoDocBasic, 'pais' => $pais1,
           'departamento' => $departamento1,'ciudad' => $ciudad1, 'genero'=>$genero1, 'grupo_rh' => $grupo_rh1,
           'tipoServicio'=>$tipoServicio, 'acompanantes'=>$acompanantes, 'serviciosUser' =>$serviciosUser,'empresaRemite'=>$empresaRemite ]);
        }        
   

     public function store(Request $request)
    {
    //   return $request->all(); // para mostrar lo que trae el request
        
      /*Esta es una de las formas de asignación para guargar el registro
        $Cliente_datosbasico = new Cliente_datosbasico();
        $Cliente_datosbasico->nombre = $request->nombre;
        $Cliente_datosbasico->apellidos = $request->apellodos;

        $Cliente_datosbasico->save();
      */

      
    /*Esta es una de las formas de asignación para guargar el registro - hace lo mosmp que el código anterio
      $Cliente_datosbasico =Cliente_datosbasico::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellodos
      ]);
    */
    
    /*Finalmente esta es la forma que usaré*/
    try {
        DB::beginTransaction(); 
         
        $dbasicoCreate = Cliente_datosbasico::create($request->all());
        // return $dbasicoCreate; 
        
        DB::commit();
        } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['message' => 'Error']);
        }
        return response()->json(['message' => 'Success']);            
    }


    public function show(Cliente_datosbasico $cliente_datosbasico)
    {
        //
    } 
                    
    public function editarCliente(Request $request)
    {   
        
    // $jaminson=$request['id'];
       $selectCliBco  = Cliente_datosbasico::where('id','=',$request['id'])->get();
       return $selectCliBco;

    }   
    public function edit(Cliente_datosbasico $cliente_datosbasico)
    {
        //  
    }

 
    public function update(Cliente_datosbasico $cliente_datosbasico, Request $request)
    {

        try {
            DB::beginTransaction(); 
             
            $idCli=$request['idCliente'];
            $cliente_datosbasico = Cliente_datosbasico::findOrFail($idCli);
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

    public function destroy(Cliente_datosbasico $cliente_datosbasico, Request $request)
    {
           // // return $request;
        // $idCli2=$request['id'];
        // $clienteEliDatosbasico = Cliente_datosbasico::find($idCli2);
        // $clienteEliDatosbasico->delete();
    }
    public function anularRegistroBsc(Request $request, Cliente_datosbasico $cliente_datosbasico)
    {
            // return $request->all();
            // return $request['eps_id'];
            try {
                DB::beginTransaction();
                $idCliAnula=$request['id'];
                $EvolAnula = Cliente_datosbasico::findOrFail($idCliAnula);
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
    public function validaDocumento(Request $request,  Cliente_datosbasico $cliente_datosbasico)
    {   

       $selectCliBco  = Cliente_datosbasico::where('num_documento','=',$request['num_documento'])->get();
       $size = count($selectCliBco);
       if($size >= 1){     
       return response()->json(['message' => 'Success']);
       }else{
        return response()->json(['message' => 'Error']);
    }

    }   

}
