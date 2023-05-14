<?php

// namespace App\Http\Controllers\backend\clientes_datos_basicos;
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cliente_datosbasico;
use App\Models\backend\TipoDocumentoModell;
use App\Http\Requests\InsertClientes;
use Illuminate\Http\Request;


class ClientesDatosBasicosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
   
       $clientesBasic  = Cliente_datosbasico::where('estado_user','=','on')->get();
       return view('backend.clientes_datos_basicos.all-cliente-basico', ['listaCli' => $clientesBasic]);        
    }

  
    public function create() //AddClienteDatoBasic() Llama a la vista para crear clientes para datos basicos del cliente
        {
           $tipoDocBasic = TipoDocumentoModell::all();     // se gusrad la consulta en la bariable $tipodocBasic
    
           return view('backend.clientes_datos_basicos.add_cliente_datobasico',['tipoDoc' => $tipoDocBasic]);
        }        
   

     public function store(InsertClientes $request)
    {
      //return $request->all(); // para mostrar lo que trae el request
      
      $cliente_basic = Cliente_datosbasico::create($request->all());
      $clientebsco  = Cliente_datosbasico::where('estado_user','=','on')->get();
      return view('backend.clientes_datos_basicos.all-cliente-basico', ['listaCli' => $clientebsco]);     
      
            //   return redirect()->route('/all-cliente-basico', $cliente_basic);           
    }


    public function show(Cliente_datosbasico $cliente_datosbasico)
    {
        //
    }

 
    public function edit(Cliente_datosbasico $cliente_datosbasico)
    {
        //
    }

 
    public function update(Request $request, Cliente_datosbasico $cliente_datosbasico)
    {
        //
    }


    public function destroy(Cliente_datosbasico $cliente_datosbasico)
    {
        //
    }
}
