<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente_datosbasico;
use App\Models\TipoServicio;
use App\Http\Requests\InsertClientesServicios;

 

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

    public function AddClienteIndex() //(Create) Llama a la vista para asignar servicios que presta la entidad
    {
        $tipoServicio  = TipoServicio::where('id','<>','0')->get();
        //return view('backend.cliente.add-cliente-servicio',['tipoServicio' => $tipoServicio]); 

        $seleUser  = Cliente_datosbasico::where('id','<>','0')->get();
        //return $seleUser;

       //return($tipoDoc);    
       return view('backend.cliente.add_cliente_servicio',['seleUsuario' => $seleUser, 'tipoServicio' => $tipoServicio ]);
    }


    public function openReservasAddServicios(Request $idcli) //(Create) Llama a la vista desde el admin de reservas para asignar servicios que presta la entidad
    {
        $tipoServicio  = TipoServicio::where('id','<>','0')->get();

        $crea_servicio  = Cliente_datosbasico::where("id","=",$idcli['idcli'])->get();
       // return $crea_servicio; //$idcli['idcli'];

        return view('backend.cliente.add_cliente_servicio_reserva',['seleUsuario' => $crea_servicio, 'tipoServicio' => $tipoServicio ]);

    }


    public function store(InsertClientesServicios $request) //(store) proceso que hace la petición al modelo y regresa
    {       
       //return $request->all(); // para mostrar lo que trae el request

                    $cliente = Clientes::create($request->all());

                     // return redirect()->route('insert-cliente-basicos', $cliente);   
                    $clientebsco  = Cliente_datosbasico::where('estado_user','=','on')->get();
                    return view('backend.clientes_datos_basicos.all-cliente-basico', ['listaCli' => $clientebsco]);             
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
       $clientes->update($request->all());
       return redirect()->route('alluser');
    }

  
    public function destroy(Clientes $clientes)
    {
        //
    }
}
