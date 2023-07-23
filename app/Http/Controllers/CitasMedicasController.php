<?php

namespace App\Http\Controllers;

use App\Models\CitasMedicasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente_datosbasico;
use App\Models\ClinicasModel;
use App\Models\MedicoExternoModel;
use Illuminate\Support\Facades\DB;
use App\Models\TiposCitasModel;
use App\Models\EspecialidadesModel;
use App\Models\TipoAtencionModel;
use Psy\Command\WhereamiCommand;

class CitasMedicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $clientesCitasMedicas = DB::table('cliente_datosbasicos')
        ->select('id','num_documento','nombre','apellidos',
        'edad','citas_pendte','estado_user')->where("estado_user", "=", "ON")->get(); 
      
        return view('backend.citas_medicas.admin-citas_medicas',['listaCitas' => $clientesCitasMedicas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idDtBasico)
    {
        // $evolucionDiariaModel = DB::table('evolucion_diaria')
        
        // $evolucionDiariaModel = DB::table('evolucion_diaria')
        // ->join('cliente_datosbasicos', 'evolucion_diaria.datosbasicos_id','=','cliente_datosbasicos.id')
        // ->join('cliente', 'evolucion_diaria.servicio_id','=','clientes.id')
        // ->join('empleado', 'evolucion_diaria.empleado_id','=','clientes.id')
        // ->join('evolucion', 'evolucion_diaria.servicio_id','=','evolucion.id')
        // ->select('cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre','cliente_datosbasicos.apellidos','cliente_datosbasicos.edad',
        // 'clientes.empresa_remite')
        // ->get(); 


        // ->where("estado_user", "=", "ON")



        // $idcli="1";
        $seleUsuario =  Cliente_datosbasico::where('id','=',$idDtBasico)->get();
        // return $seleUsuario;

        $tipoCitaMedica = TiposCitasModel::all();
        $especialidad = EspecialidadesModel::all();
        $atencionMed = TipoAtencionModel::all();
        $clinicAtencion = ClinicasModel::all();
        $medicosExternos = MedicoExternoModel::all();

        // $crea_servicio  = Cliente_datosbasico::where('id','=',$idcli)->get();

            return view('backend.citas_medicas.add_citas_medicas',['tipoCita' => $tipoCitaMedica, 'especialidad' => $especialidad, 'atencionMedica' => $atencionMed, 
            'clinicAtencion' =>$clinicAtencion, 'idCliente'=>$idDtBasico,'medicosExternos'=>$medicosExternos, 'seleUsuario'=>$seleUsuario]);        
        }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
                // return $request->fecha_pedido_cita;
                $citaPendte = $request->citas_pendte;
                // return $citaPendte;
                $numb = intval($citaPendte);
                $numb = $numb +1;
                $citas = new CitasMedicasModel();
                $citas->fecha_pedido_cita = $request->fecha_pedido_cita; 
                $citas->tiposcita_id = $request->tiposcita_id;
                $citas->especialidades_id = $request->especialidades_id;
                $citas->clinica_id = $request->clinica_id;
                $citas->medico_remite_id = $request->medico_remite_id;
                $citas->fecha_cita = $request->fecha_cita;
                $citas->hora_ingreso_cita = $request->hora_ingreso_cita;
                $citas->datosbasicos_id = $request->datosbasicos_id;
                $citas->tipoatencion_id = $request->tipoatencion_id;
                $citas->riesgo_cita = $request->riesgo_cita;
                $citas->estado_citas = $request->estado_citas;
                $citas->comentario_cita = $request->comentario_cita;
                $citas->user_id = $request->user_id;
                $citas->save();
                
                //Actualización de clientes_datosbasicos (citas_pendte)
                $idDtBasico = $request->datosbasicos_id;            
                $clienteCita = Cliente_datosbasico::findOrFail($idDtBasico);
                $clienteCita->citas_pendte = $numb;
                $clienteCita->save();                  
 
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
        // return $clienteServi2;  
        return response()->json(['message' => 'Success']);


        // $Cliente_citas = CitasMedicasModel::create($request->all());
        return $request->all();        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CitasMedicasModel  $citasMedicasModel
     * @return \Illuminate\Http\Response
     */
    public function show(CitasMedicasModel $citasMedicasModel)
    {
  //    
    }

    public function busquedaClienteCita(){
        $clientesDtoBasic2 = DB::table('citas_medicas')
       ->join('clinicas', 'citas_medicas.clinica_id','=','clinicas.id')
        ->select('citas_medicas.id','citas_medicas.fecha_pedido_cita','citas_medicas.fecha_cita','citas_medicas.hora_cita','clinicas.nombre',
            'citas_medicas.estado_citas','citas_medicas.tiposcita_id','citas_medicas.especialidades_id','citas_medicas.tipoatencion_id',
            'citas_medicas.clinica_id','citas_medicas.medico_remite_id','citas_medicas.riesgo_cita',
            'citas_medicas.duracion_cita', 'citas_medicas.Procedimiento_realizado', 'citas_medicas.archivo_cita','citas_medicas.comentario_cita',
            'citas_medicas.recomendaciones')->get();


        return $clientesDtoBasic2; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CitasMedicasModel  $citasMedicasModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CitasMedicasModel $citasMedicasModel)
    {
        //
    }

    public function update(Request $request, CitasMedicasModel $citasMedicasModel)
    {
        // return $request['idCitaMedica'];
        try {
            DB::beginTransaction();
            $idCli2=$request['idCitaMedica'];
            $clienteCita = CitasMedicasModel::findOrFail($idCli2);
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CitasMedicasModel  $citasMedicasModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CitasMedicasModel $citasMedicasModel)
    {
        //
    }
}
