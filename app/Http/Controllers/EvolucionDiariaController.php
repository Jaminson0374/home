<?php

namespace App\Http\Controllers;
use App\Models\CitasMedicasModel;
use App\Models\Cliente_datosbasico;
use App\Models\ClinicasModel;
use App\Models\EvolucionDiariaModel;
use Illuminate\Http\Request;
use App\Models\EmpleadosModell;
use App\Models\TiposCitasModel;
use App\Models\EspecialidadesModel;
use App\Models\TipoAtencionModel;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\DB;

class EvolucionDiariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientesEvolucionDiaria = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos',
        'edad','ult_fecha_evo','ult_hora_evo','ult_evolucion','estado_user')->where("estado_user", "=", "ON")->get(); 

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

        $tipoCitaMedica = TiposCitasModel::all();
        $especialidad = EspecialidadesModel::all();
        $atencionMed = TipoAtencionModel::all();
        $clinicAtencion = ClinicasModel::all();
        $empleMedicos = EmpleadosModell::where('categoria_id','=','2')->get(); //La cataegoria 2 corresponde a medicos

        // $crea_servicio  = Cliente_datosbasico::where('id','=',$idcli)->get();

            return view('backend.evolucion_medica.add_evolucion_diaria',['tipoCita' => $tipoCitaMedica, 'especialidad' => $especialidad, 'atencionMedica' => $atencionMed, 
            'clinicAtencion' =>$clinicAtencion, 'idCliente'=>$idDtBasico,'empleados'=>$empleMedicos, 'seleUsuario'=>$seleUsuario]);                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EvolucionDiariaModel  $evolucionDiariaModel
     * @return \Illuminate\Http\Response
     */
    public function show(EvolucionDiariaModel $evolucionDiariaModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EvolucionDiariaModel  $evolucionDiariaModel
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EvolucionDiariaModel  $evolucionDiariaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvolucionDiariaModel $evolucionDiariaModel)
    {
        //
    }
}
