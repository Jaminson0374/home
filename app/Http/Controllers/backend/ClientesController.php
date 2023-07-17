<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente_datosbasico;
use App\Models\TipoServicio;
use App\Http\Requests\InsertClientesServicios;
use App\Models\AcompanantesModel;
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
        
        
        //SELECT datosbasicos_id, cubiculos_id, costo_servicio,nombre, apellidos, telefonos_user, email_user, num_documento from clientes JOIN cliente_datosbasicos on clientes.datosbasicos_id = cliente_datosbasicos.id; 
        //SELECT cubiculos_id, costo_servicio, descripcion from clientes JOIN tiposervicios on clientes.tiposervicio_id = tiposervicios.id; 

       /*EN ESTE SELEC SE CRUZAN POR MEDIO DE JOIN 3 TABLAS (clientes,cliente_datosbasicos,tiposervicios) TENIENDO EN CUENTA LA RELACIÓN ESTABLECIDA*/

        $clientesBasic = DB::table('clientes')
        ->join('cliente_datosbasicos', 'clientes.datosbasicos_id','=','cliente_datosbasicos.id')
        ->join('tiposervicios', 'clientes.tiposervicio_id','=','tiposervicios.id')
        ->select('clientes.id','cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre','cliente_datosbasicos.apellidos','cliente_datosbasicos.edad',
                 'cliente_datosbasicos.telefonos_user','tiposervicios.descripcion')
        ->get(); 

        // $clientesBasic = DB::table('clientes')
        // ->join('cliente_datosbasicos', 'clientes.datosbasicos_id','=','cliente_datosbasicos.id')
        // ->join('tiposervicios', 'clientes.tiposervicio_id','=','tiposervicios.id')
        // ->select('clientes.id','cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre','cliente_datosbasicos.apellidos','cliente_datosbasicos.edad',
        //          'cliente_datosbasicos.telefonos_user','tiposervicios.descripcion','cliente_datosbasicos.id_tipodoc', 'cliente_datosbasicos.nacionalidad_id',
        //          'cliente_datosbasicos.departamento_id', 'cliente_datosbasicos.ciudad_id', 'cliente_datosbasicos.fecha_nacimiento',
        //          'cliente_datosbasicos.sexo_id','cliente_datosbasicos.grupoSanguineo_id', 'cliente_datosbasicos.direccion_res',
        //          'cliente_datosbasicos.email_user', 'cliente_datosbasicos.fecha_creacion', 'cliente_datosbasicos.estado_user', 
        //          'cliente_datosbasicos.observacion', 'cliente_datosbasicos.diagnostico')
        // ->get();
        
        // $clientesBasic  = Clientes::where('estado','=','on')->get();
       
        return $clientesBasic;

    // $tipoServicio  = TipoServicio::where('id','<>','0')->get();
       // return $clientesBasic;
     //return view('backend.cliente.admin-clientes', ['listaCli' => $clientesBasic]);   
     }

    public function AddClienteIndex() //(Create) Llama a la vista para asignar servicios desde el menú 
    {   
        $idTps ="6";
        $tipoServicio  = TipoServicio::where('id','<>',$idTps)->get();
        $empresaRemite = EmpresaRemitenteModell::all();
        $empleados = EmpleadosModell::all();
        $tipoAfiliacion = TipoAfiliacionModel::all();
        $rangoEps = RangoEpsModel::all();
        $cubiculos = CubiculosModel::all();
        $acompanantes = AcompanantesModel::all();
        $crea_servicio  = Cliente_datosbasico::where("tiposervicio_id","=",$idTps)->get();

        return view('backend.cliente.add_cliente_servicio',['seleUsuario' => $crea_servicio, 'tipoServicio' => $tipoServicio, 'empresaRemite'=> $empresaRemite,
        'tipoAfiliacion' =>$tipoAfiliacion, 'empleados' =>$empleados, 'rangoEps' =>$rangoEps, 'cubiculos'=>$cubiculos, 'acompanantes'=>$acompanantes]);

        $seleUser  = Cliente_datosbasico::where('id','<>','0')->get();
        //return $seleUser;

       //return($tipoDoc);    
       return view('backend.cliente.add_cliente_servicio',['seleUsuario' => $seleUser, 'tipoServicio' => $tipoServicio ]);
    }

    public function openReservasAddServicios(Request $idcli) //(Create) Llama a la vista desde el admin de reservas para asignar servicios que presta la entidad
    {
        // Este controlador es el mismo que asignarServicioCliente, se deja para no creal conflicos en archivo de rutas

    }
    public function traeClienteServicio(Clientes $cliente, Request $request){
            // return $request->id; 
            // return $request->data['cubiculos_id'];
            $browsCliServicio = Clientes::where("id","=",$request->id)->get();
            return $browsCliServicio;
    }

    public function create($idcli) //(Create) Llama a la vista desde el admin asignar servicios que presta la entidad
    {
        // return $idcli;
        // $idcli = $request->data['id'];
        // $clienId = $idcli['idCli1'];
        // return 'JAMINSON HERRER FLOREZ'; // $idcli;
        // ['idCli1'=>$row->id],['nDoc1'=>$row->num_documento],['nomb1'=>$row->nombre],['ape1'=>$row->apellidos];


        $idTps="15";  // este es valor del id  del servicio que se asigna como pendiente al crear el usuario por primera vez
        $empresaRemite = EmpresaRemitenteModell::all();
        $empleados = EmpleadosModell::all();
        $tipoAfiliacion = TipoAfiliacionModel::all();
        $medicosExternos = MedicoExternoModel::all();
        $rangoEps = RangoEpsModel::all();
        $cubiculos = CubiculosModel::all();
        $acompanantes = AcompanantesModel::all();
        $tipoServicio  = TipoServicio::where('id','<>',$idTps)->get();
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
        // $SI_RES =$siServicio.' '.$cliBuscar[0]->id;
        // return $SI_RES;
            return view('backend.cliente.add_cliente_servicio',['seleUsuario' => $crea_servicio,'tipoServicio' => $tipoServicio, 'empresaRemite'=> $empresaRemite,
            'tipoAfiliacion' =>$tipoAfiliacion, 'empleados' =>$empleados, 'rangoEps' =>$rangoEps, 'cubiculos'=>$cubiculos, 'acompanantes'=>$acompanantes, 'idCliente'=>$idcli,
            'medicosExternos'=>$medicosExternos, 'siServicio'=>$siServicio, 'idCliServi'=>$idCliServi]);
    }
    
    public function store(Request $request) //(store) Guadar datos clientes con servicios
    {       
    // return $request;
    // return $request->data['cubiculos_id'];
    // $resultado = $request->data;
        // $clienteServi = Clientes::create($resultado); //cuando se llena la data desde dentro de axios
 

        // return $request->datosbasicos_id;
        
        $idServicio =  Cliente_datosbasico::find($request->datosbasicos_id);
        $idServicio->tiposervicio_id = $request->tiposervicio_id;
        $idServicio->save();

        $clienteServi = Clientes::create($request->all()); 
        return $clienteServi;           
    }

    public function TipoServicio(){
        $tipoServicio  = TipoServicio::where('id','<>','0')->get();
        return view('backend.cliente.servicio_cliente',['tipoServicio' => $tipoServicio]); 

    }
    public function show(Clientes $clientes)
    {

    }

   
    public function edit(Clientes $clientes)
    {
        return view('edit-user/{id}',compact('EditUser'));
    }

  
    public function update(Request $request, Clientes $clientes)
    {
        // return $request['idClienteServicio'];
        $idCli2=$request['idClienteServicio'];
        $clienteServi2 = Clientes::findOrFail($idCli2);
        $clienteServi2->fill($request->all());
        $clienteServi2->save();  
        return $clienteServi2;    

        // $clientes->update($request->all());
       return redirect()->route('alluser');
    }

  
    public function destroy(Clientes $clientes)
    {
        //
    }
}
