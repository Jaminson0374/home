<?php

namespace App\Http\Controllers;

use App\Models\EmpleadosModell;
use App\Models\CiudadesModell;
use App\Models\DepartamentosModell;
use App\Models\GrpSangreModell;
use App\Models\PaisModell;
use App\Models\SexoModell;
use App\Models\CargosModell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleadoIndex = DB::table('empleados')
        ->join('sexo', 'empleados.sexo_id','=','sexo.id')
        ->join('tipo_documentos', 'empleados.tipodocumento_id','=','tipo_documentos.id')
        ->join('cargos', 'empleados.cargo_id', '=','cargos.id')
        ->select('empleados.id',DB::raw('CONCAT(empleados.nombre," ",empleados.apellidos) as empleado'),
        'tipo_documentos.descripcion as tipo_doc', 'empleados.num_documento', 'cargos.descripcion as cargo',
        'empleados.edad','empleados.telefonos','sexo.descripcion as sexo')->get();
        // return $empleadoIndex;
        return view('backend.empleados.empleados_index',compact(['empleadoIndex']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            //lo traigo de datos basicos como apoyo
           $tipoDocBasic = TipoDocumentoModell::all();     // se guarda la consulta en la bariable $tipodocBasic
           $pais1 = PaisModell::all();
           $departamento1 = DepartamentosModell::all();
           $ciudad1 = CiudadesModell::all();
           $genero1 = SexoModell::all();
           $grupo_rh1 = GrpSangreModell::all();
           return view('backend.clientes_datos_basicos.add_cliente_datobasico',['tipoDoc' => $tipoDocBasic, 'pais' => $pais1,
           'departamento' => $departamento1,'ciudad' => $ciudad1, 'genero'=>$genero1, 'grupo_rh' => $grupo_rh1]);
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
     * @param  \App\Models\EmpleadosModell  $empleadosModell
     * @return \Illuminate\Http\Response
     */
    public function show(EmpleadosModell $empleadosModell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpleadosModell  $empleadosModell
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpleadosModell $empleadosModell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpleadosModell  $empleadosModell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpleadosModell $empleadosModell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpleadosModell  $empleadosModell
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpleadosModell $empleadosModell)
    {
        //
    }
}
