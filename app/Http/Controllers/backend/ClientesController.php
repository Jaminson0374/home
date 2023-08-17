<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente_datosbasico;
use App\Models\TipoServicio;
use App\Models\AcompanantesModel;
use App\Models\CamaModel;
use App\Models\ClinicasModel;
use App\Models\CubiculosModel;
use App\Models\EmpleadosModell;
use App\Models\EmpresaRemitenteModell;
use App\Models\MedicoExternoModel;
use App\Models\RangoEpsModel;
use App\Models\TipoAfiliacionModel;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index() //llena la tabla con todos los registros de cliente
     {
        $clientesBasic = DB::table('clientes')
        ->join('cliente_datosbasicos', 'clientes.datosbasicos_id','=','cliente_datosbasicos.id')
        ->join('tiposervicios', 'clientes.tiposervicio_id','=','tiposervicios.id')
        ->select('clientes.id','cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre','cliente_datosbasicos.apellidos','cliente_datosbasicos.edad',
                 'cliente_datosbasicos.telefonos_user','tiposervicios.descripcion')
        ->get(); 
       
        // $clientesBasic  = Clientes::where('estado','=','on')->get();
       
        return $clientesBasic;
     }

    public function traeClienteServicio(Clientes $cliente, Request $request){
            // return $request->all(); 
            // return $request->data['cubiculos_id'];
            $browsCliServicio = Clientes::where("datosbasicos_id","=",$request->datosbasicos_id)->get();
            return $browsCliServicio;
    }

    public function buscarCliUser(){
        // return $request->id; 
        // return $request->data['cubiculos_id'];

        $locateCliente = DB::table('clientes')
        ->join('cliente_datosbasicos', 'clientes.datosbasicos_id','=','cliente_datosbasicos.id')
        ->join('tiposervicios', 'clientes.tiposervicio_id','=','tiposervicios.id')
        ->select('clientes.id','cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre','cliente_datosbasicos.apellidos','cliente_datosbasicos.edad',
                 'cliente_datosbasicos.telefonos_user','tiposervicios.descripcion')
        ->get(); 

        $locateCliente = Clientes::all();
        return $locateCliente;
    }


    public function create($idcli) //(Create) Llama a la vista desde el admin asignar servicios que presta la entidad
    {
        // return $idcli;
        // $idcli = $request->data['id'];
        // $clienId = $idcli['idCli1'];
    

        $camaNum = CamaModel::all();
        $clinicaUrge = ClinicasModel::all();
        // $empresaRemite = EmpresaRemitenteModell::all();
        $empleados = EmpleadosModell::all();
        $tipoAfiliacion = TipoAfiliacionModel::all();
        $medicosExternos = MedicoExternoModel::all();
        $rangoEps = RangoEpsModel::all();
        $cubiculos = CubiculosModel::all();
        $acompanantes = AcompanantesModel::all();
        $crea_servicio  = Cliente_datosbasico::where('id','=',$idcli)->get();
        $idCliServi = "";
        $siServicio="NO";
        $cliBuscar = Clientes::where('datosbasicos_id','=',$idcli)->get();
        if ($cliBuscar =="[]"){
            $siServicio="NO";
        }else{
            $siServicio="SI";
            $idCliServi =$cliBuscar[0]->id; 
        }
        $tipoServicio  = TipoServicio::where('id','=',$crea_servicio[0]->tiposervicio_id)->get();;
        $fservi = $tipoServicio[0]->formulario;
        $formularioServi ='backend.cliente.'.$fservi;
        $nomService = $tipoServicio[0]->descripcion;

            return view($formularioServi,['seleUsuario' => $crea_servicio,'tipoServicio' => $tipoServicio, 
            'tipoAfiliacion' =>$tipoAfiliacion, 'empleados' =>$empleados, 'rangoEps' =>$rangoEps, 'cubiculos'=>$cubiculos, 'acompanantes'=>$acompanantes, 'idCliente'=>$idcli,
            'medicosExternos'=>$medicosExternos, 'siServicio'=>$siServicio, 'idCliServi'=>$idCliServi, 'nomService' =>$nomService,
            'clinicaUrge'=>$clinicaUrge, 'camaNum'=>$camaNum]);
    }
    
    public function store(Request $request) //(store) Guadar datos clientes con servicios
    {       
        try {
            DB::beginTransaction(); 
             
            $idServicio =  Cliente_datosbasico::find($request->datosbasicos_id);
            $idServicio->fecha_creacion= $request->fecha_ingreso;
            $idServicio->fecha_retiro = $request->fecha_retiro;
            $idServicio->estado_servicio = $request->estado;
    
            $idServicio->save();
    
            $clienteServi = Clientes::create($request->all()); 
            // return $clienteServi;           
            
            DB::commit();
            } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);            
    }


    public function show(Clientes $clientes)
    {

    }

   
    public function edit(Clientes $clientes)
    {

    }

  
    public function update(Request $request, Clientes $clientes)
    {
       
        // return $request->fecha_ingreso;
        // return $request['idClienteServicio'];
        // return $request->idClientId;

        try {
            DB::beginTransaction(); 

            $idServicio =  Cliente_datosbasico::find($request->idClienteServicio);
            // if($idServicio){
            //     return "jaminson ".$idServicio; //$request->idClienteServicio;
            // }
            $idServicio->fecha_creacion = $request->fecha_ingreso;
            $idServicio->fecha_retiro = $request->fecha_retiro;
            $idServicio->estado_servicio = $request->estado;

            $idServicio->save();
    
            // $idCli2=$request['idClienteServicio'];
            $clienteServi2 = Clientes::findOrFail($request->idClientId);
            $clienteServi2->fill($request->all());
            $clienteServi2->save();  
            // return $clienteServi2;    
            
            DB::commit();
            } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
            }
            return response()->json(['message' => 'Success']);            
    }

  
    public function destroy(Clientes $clientes)
    {
        //
    }
}
