<?php

namespace App\Http\Controllers;

use App\Models\SignosVitalesModel;
use App\Models\Cliente_datosbasico;
use App\Models\EmpleadosModell;
use App\Models\EmpresaRemitenteModell;
use App\Models\TipoEmpresaRemitenteModell;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SignosVitalesController extends Controller
{
    public function index()
    {
            $listaSignos = DB::table('cliente_datosbasicos')
            ->select('cliente_datosbasicos.id','cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre',
            'cliente_datosbasicos.apellidos',
            'cliente_datosbasicos.edad','cliente_datosbasicos.ult_fecha_sv','cliente_datosbasicos.ult_hora_sv',
            'cliente_datosbasicos.estado_user')->where("cliente_datosbasicos.estado_servicio", "=", "on")->get(); 
            // return $listaSignos;
            
             return view('backend.controles_medicos.signos_vitales.admin_signos_vitales',compact(['listaSignos']));
    }
   
    public function create($idDtBasico)
    {
                $seleUsuarioSv = Cliente_datosbasico::where('id','=',$idDtBasico)->get();
                $empresaRemiteSv = EmpresaRemitenteModell::all();
                $empleadosSv =  EmpleadosModell::where('categoria_id','=','2')->get(); //La cataegoria 2 corresponde a salud (medicos, enfermeros)
                // return $seleUsuario;
                // $crea_servicio  = Cliente_datosbasico::where('id','=',$idcli)->get();
        
                    return view('backend.controles_medicos.signos_vitales.add_signos_vitales',compact(['seleUsuarioSv','empresaRemiteSv','empleadosSv']));                
    }

    
    public function store(Request $request, SignosVitalesModel $signosVitalesModel)
    {
        // return $request->datosbasicos_id;
        try {
            DB::beginTransaction();        
                $idDtBasico =  Cliente_datosbasico::find($request->datosbasicos_id);
                $idDtBasico->ult_fecha_sv = $request->fecha;
                $idDtBasico->ult_hora_sv = $request->hora;
                $idDtBasico->save();
                
                $signosV = SignosVitalesModel::create($request->all()); 
                
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            // return $clienteEvolMedic;  
            // return $clienteServi2;  
            return response()->json(['message' => 'Success']);
    }

    public function show()
    {  

       $clientesSv = DB::table('signos_vitales')
       ->join('cliente_datosbasicos', 'signos_vitales.datosbasicos_id','=','cliente_datosbasicos.id')
       ->select('signos_vitales.id','signos_vitales.fecha', 'signos_vitales.hora','cliente_datosbasicos.nombre',
            'cliente_datosbasicos.apellidos', 'signos_vitales.empleado_id','signos_vitales.signosv_fr', 
            'signos_vitales.signosv_ta','signos_vitales.signosv_t','signos_vitales.signosv_pc',
            'signos_vitales.sv_saturacion','signos_vitales.recomendaciones')->get();

            // where('signos_vitales.anulado','=',NULL)->
            //    'signos_vitales.anulado','=',NULL,
            return $clientesSv;                      
    }

    
    public function edit(SignosVitalesModel $signosVitalesModel)
    {
        //
    }

    
    public function update(Request $request, SignosVitalesModel $signosVitalesModel)
    {
        //
    }

    public function destroy(SignosVitalesModel $signosVitalesModel)
    {
        //
    }
}
