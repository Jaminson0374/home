<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente_datosbasico;
use App\Http\Requests\InsertClientesServicios;

use App\Models\TipoServicio;

use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    // public function AllCliente() //(index) llena la tabla con todos los registros de cliente
    // {
     
        /*$tipo_documento = Clientes::find(1);
        dd($tipo_documento->tipo_documento);*/
   

    public function AddClienteIndex() //(Create) Llama a la vista para asignar servicios que presta la entidad
    {
        $seleUser  = Cliente_datosbasico::where('id','<>','0')->get();
        //return $seleUser;

       //return($tipoDoc);    
       return view('backend.cliente.add_cliente_servicio',['seleUsuario' => $seleUser]);
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
