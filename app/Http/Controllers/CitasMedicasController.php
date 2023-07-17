<?php

namespace App\Http\Controllers;

use App\Models\CitasMedicasModel;
use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente_datosbasico;
use App\Models\TipoServicio;
use App\Models\AcompanantesModel;
use App\Models\CubiculosModel;
use App\Models\EmpleadosModell;
use App\Models\EmpresaRemitenteModell;
use App\Models\MedicoExternoModel;
use App\Models\RangoEpsModel;
use App\Models\TipoAfiliacionModel;
use Illuminate\Support\Facades\DB;
use App\Models\TiposCitasModel;
use App\Models\EspecialidadesModel;
use App\Models\TipoAtencionModel;



class CitasMedicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* <td>{{$key+1}}</td>
        <td>{{$row->num_documento}}</td>
        <td>{{$row->nombre." ".$row->apellidos}}</td>
        <td>{{$row->edad}}</td>
        <td class="text-center">{{$row->nom_eps}}</td> 
        <td>{{$row->cita_cercana}}</td>
        <td>{{$row->citas_pendientes}}</td>*/

        $clientesCitasMedicas = DB::table('citas_medicas')
        ->join('clientes_datosbasicos', 'citas_medicas.datosbasicos_id','=','datosbasicos_id')
        ->select('cliente_datosbasicos.id','cliente_datosbasicos.num_documento','cliente_datosbasicos.nombre','cliente_datosbasicos.apellidos','cliente_datosbasicos.edad',
                 'cliente_datosbasicos.telefonos_user','tiposervicios.descripcion','cliente_datosbasicos.id_tipodoc', 'cliente_datosbasicos.nacionalidad_id',
                 'cliente_datosbasicos.departamento_id', 'cliente_datosbasicos.ciudad_id', 'cliente_datosbasicos.fecha_nacimiento',
                 'cliente_datosbasicos.sexo_id','cliente_datosbasicos.grupoSanguineo_id', 'cliente_datosbasicos.direccion_res',
                 'cliente_datosbasicos.email_user', 'cliente_datosbasicos.fecha_creacion', 'cliente_datosbasicos.estado_user', 
                 'cliente_datosbasicos.observacion', 'cliente_datosbasicos.diagnostico')->get();



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

        $clientesCitasMedicas = DB::table('cliente_datosbasicos')
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
        return view('backend.citas_medicas.admin-citas_medicas',['listaCitas' => $clientesCitasMedicas]);
    //    return view('backend.clientes.admin-clientes');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idcli="1";
        $idTps="15";  // este es valor del id  del servicio que se asigna como pendiente al crear el usuario por primera vez
        $tipoCitaMedica = TiposCitasModel::all();
        $especialidad = EspecialidadesModel::all();
        $atencionMed = TipoAtencionModel::all();


        $empresaRemite = EmpresaRemitenteModell::all();
        $empleados = EmpleadosModell::all();
        $tipoAfiliacion = TipoAfiliacionModel::all();
        $medicosExternos = MedicoExternoModel::all();
        $rangoEps = RangoEpsModel::all();
        $cubiculos = CubiculosModel::all();
        $acompanantes = AcompanantesModel::all();
        // $tipoServicio  = TipoServicio::where('id','<>',$idTps)->get();
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
            return view('backend.citas_medicas.add_citas_medicas',['tipoCita' => $tipoCitaMedica, 'especialidad' => $especialidad, 'atencionMedica' => $atencionMed, 'seleUsuario' => $crea_servicio, 'empresaRemite'=> $empresaRemite,
            'tipoAfiliacion' =>$tipoAfiliacion, 'empleados' =>$empleados, 'rangoEps' =>$rangoEps, 'cubiculos'=>$cubiculos, 'acompanantes'=>$acompanantes, 'idCliente'=>$idcli,
            'medicosExternos'=>$medicosExternos, 'siServicio'=>$siServicio, 'idCliServi'=>$idCliServi]);        
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
     * @param  \App\Models\CitasMedicasModel  $citasMedicasModel
     * @return \Illuminate\Http\Response
     */
    public function show(CitasMedicasModel $citasMedicasModel)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CitasMedicasModel  $citasMedicasModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CitasMedicasModel $citasMedicasModel)
    {
        //
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
