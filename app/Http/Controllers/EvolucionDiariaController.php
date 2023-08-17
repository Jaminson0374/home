<?php

namespace App\Http\Controllers;
use App\Models\Cliente_datosbasico;
use App\Models\ClinicasModel;
use App\Models\EvolucionDiariaModel;
use Illuminate\Http\Request;
use App\Models\EmpleadosModell;
use App\Models\TiposCitasModel;
use App\Models\EspecialidadesModel;
use App\Models\TipoAtencionModel;
use App\Models\EvolucionModel;
use App\Models\EstadoSigvitalesModel;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\DB;

class EvolucionDiariaController extends Controller
{
 
    public function index()
    {
        $clientesEvolucionDiaria = DB::table('cliente_datosbasicos')
        ->join('evolucion_diaria', 'cliente_datosbasicos.id','=','evolucion_diaria.datosbasicos_id')
        ->join('evolucion', 'evolucion_diaria.evolucion_id','=','evolucion.id')
        ->select('cliente_datosbasicos.id','cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre',
        'cliente_datosbasicos.apellidos','evolucion.descripcion','evolucion_diaria.evolucion_id',
        'cliente_datosbasicos.edad','cliente_datosbasicos.ult_fecha_evo','cliente_datosbasicos.ult_hora_evo',
        'cliente_datosbasicos.ult_evolucion','cliente_datosbasicos.estado_user')->where("cliente_datosbasicos.estado_servicio", "=", "on")->get(); 

         return view('backend.evolucion_medica.admin_evolucion_diaria',['listaEvolucion' => $clientesEvolucionDiaria]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idDtBasico)
    {
        // $idcli="1";
        $seleUsuario =  Cliente_datosbasico::where('id','=',$idDtBasico)->get();
        // return $seleUsuario;

        $estadosigv = EstadoSigvitalesModel::all();
        $evolucion = EvolucionModel::all();
        $tipoCitaMedica = TiposCitasModel::all();
        $especialidad = EspecialidadesModel::all();
        $atencionMed = TipoAtencionModel::all();
        $clinicAtencion = ClinicasModel::all();
        $empleMedicos = EmpleadosModell::where('categoria_id','=','2')->get(); //La cataegoria 2 corresponde a salud (medicos, enfermeros)
        // return $seleUsuario;
        // $crea_servicio  = Cliente_datosbasico::where('id','=',$idcli)->get();

            return view('backend.evolucion_medica.add_evolucion_diaria',['tipoCita' => $tipoCitaMedica, 'especialidad' => $especialidad, 'atencionMedica' => $atencionMed, 
            'clinicAtencion' =>$clinicAtencion, 'idCliente'=>$idDtBasico,'empleados'=>$empleMedicos, 'seleUsuario'=>$seleUsuario, 'evolucion'=>$evolucion,'estadosigv'=>$estadosigv]);                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request;
    // return $request->data['cubiculos_id'];
    // $resultado = $request->data;
        // $clienteServi = Clientes::create($resultado); //cuando se llena la data desde dentro de axios
 
        // return $request->datosbasicos_id;
        try {
            DB::beginTransaction();        
                $idDtBasico =  Cliente_datosbasico::find($request->datosbasicos_id);
                $idDtBasico->ult_fecha_evo = $request->fecha;
                $idDtBasico->ult_hora_evo = $request->hora;
                $idDtBasico->ult_evolucion = $request->diagfinal_sv;
                $idDtBasico->save();
                
                $clienteEvolMedic = EvolucionDiariaModel::create($request->all()); 
                
            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            // return $clienteEvolMedic;  
            // return $clienteServi2;  
            return response()->json(['message' => 'Success']);
    
    
            // $Cliente_citas = CitasMedicasModel::create($request->all());
            // return $request->all();                                
    }

    public function busquedaCtrlMed(){
        // ->where('evolucion_diaria.anulado','=','')
        $clientesEvolucion = DB::table('evolucion_diaria')
       ->join('cliente_datosbasicos', 'evolucion_diaria.datosbasicos_id','=','cliente_datosbasicos.id')
       ->join('evolucion', 'evolucion_diaria.evolucion_id','=','evolucion.id')
       ->select('evolucion_diaria.id','evolucion_diaria.fecha', 'evolucion_diaria.hora','cliente_datosbasicos.nombre',
            'cliente_datosbasicos.apellidos', 'evolucion.descripcion', 'evolucion_diaria.evolucion_id', 'evolucion_diaria.estado_sigvitales_id',
            'evolucion_diaria.empleado_id', 'cliente_datosbasicos.diagnostico',
            'evolucion_diaria.signosv_fr', 'evolucion_diaria.signosv_ta','evolucion_diaria.signosv_t',
            'evolucion_diaria.signosv_pc', 'evolucion_diaria.signosv_p', 'evolucion_diaria.subjetivo', 'evolucion_diaria.objetivo',
            'evolucion_diaria.apreciacion', 'evolucion_diaria.plan',
            'evolucion_diaria.recomendaciones')->where('evolucion_diaria.anulado','=',NULL)->get();;
        return $clientesEvolucion;         
    }
   
    public function show(EvolucionDiariaModel $evolucionDiariaModel)
    {
        //
    }

    
    public function edit(EvolucionDiariaModel $evolucionDiariaModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EvolucionDiariaModel  $evolucionDiariaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EvolucionDiariaModel $evolucionDiariaModel)
    {
            // return $request['idEvolMedica'];
            try {
                DB::beginTransaction();
                $idCli3=$request['idEvolMedica'];
                $clienteCita = EvolucionDiariaModel::findOrFail($idCli3);
                $clienteCita->fill($request->all());
                $clienteCita->save();  
       
                // $clientes->update($request->all());
            //    return redirect()->route('alluser');
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Error']);
            }
            // return $clienteServi2;  
            return response()->json(['message' => 'Success']);
    }

    public function destroy(EvolucionDiariaModel $evolucionDiariaModel)
    {
            //
    }
    public function anularRegistro(Request $request, EvolucionDiariaModel $evolucionDiariaModel)
    {
            // return $request['idEvolucion'];
            try {
                DB::beginTransaction();
                $idCliAnula=$request['idEvolucion'];
                $EvolAnula = EvolucionDiariaModel::findOrFail($idCliAnula);
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
