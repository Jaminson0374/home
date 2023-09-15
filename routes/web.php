<?php
use App\Http\controller\backend\ClientesController;
use App\Http\Controllers\backend\TipoDocumentoController;
use App\Http\Controllers\backend\EmpleadosController;
use App\Http\Controllers\backend\ClientesDatosBasicosControlle;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PUEDO HACER UNA SOLA RUTA PARA TODOS LOS METODOS DE LA CLASE ClientesController. así:
//*- Route::resource('/clientes',ClientesController::class);
//Laravel ya sabe que los metodos del la clase ClientesController, son Index, Create, Store, Update, Drop 

 
//Administrador de usuarios
// Route::get('/all-user', [App\Http\Controllers\backend\UserController::class, 'AllUser'])->name('alluser');

// Route::get('/add-user-index', [App\Http\Controllers\backend\UserController::class, 'AddUserIndex'])->name('AddUserIndex');

/**********************************************************************
 * RUTAS PARA LOS USUARIOS QUE ITERACTUAN CON LA APLICACION           *
 **********************************************************************/

Route::get('/', [App\Http\Controllers\backend\UserController::class, 'AddUserIndex'])->name('AddUserIndex');

Route::post('/insert-user', [App\Http\Controllers\backend\UserController::class, 'InsertUser'])->name('InsertUser');

Route::get('/edit-user/{id}', [App\Http\Controllers\backend\UserController::class, 'EditUser'])->name('EditUser');

Route::post('/update-user/{id}', [App\Http\Controllers\backend\UserController::class, 'UpdateUser'])->name('UpdateUser');

Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'DeleteUser'])->name('DeleteUser');


/**********************************************************************
 * RUTAS PARA LOS SERVICIOS QUE PRESTA LA FUNDACION                   *
 **********************************************************************/

//Administrador de servicios (php artisan make:contoller TipoServicioContrller --model=Photo --resource])
Route::get('/all-tipo-servicio', [App\Http\Controllers\TipoServicioController::class, 'AllTipoServicio'])->name('AllTipoServicio');

Route::get('/tipo-servicio', [App\Http\Controllers\TipoServicioController::class, 'TipoServicio'])->name('TipoServicio');

Route::get('/admin-clientes', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'index'])->name('AdminClientes');

Route::get('/admin-prueba', function() {
    return view('backend.cliente.admin-clientes');
});

//******************************************************
//* CLIENTES SERVICIOS
Route::get('/asignar-servicio/{idCliente}', [App\Http\Controllers\backend\ClientesController::class, 'create'])->name('AsignarServicioCliente');
Route::post('/insert-cliente-servicio', [App\Http\Controllers\backend\ClientesController::class, 'store'])->name('InsertClienteServicio');
Route::post('/clienteCliUpdateServicios', [App\Http\Controllers\backend\ClientesController::class, 'update'])->name('ClienteUpdateCliServicios');
Route::get('/delete-cliente/{id}', [App\Http\Controllers\backend\ClientesController::class, 'DeleteCliente'])->name('DeleteCliente');
Route::post('/traeClienteConServicio', [App\Http\Controllers\backend\ClientesController::class, 'traeClienteServicio'])->name('TraeClienteConServicio');
Route::post('/buscarClienteUser', [App\Http\Controllers\backend\ClientesController::class, 'buscarCliUser'])->name('BuscarClienteUser');

// Route::post('/clienteCliUpdateServicios/{idCliServi}', [App\Http\Controllers\backend\ClientesController::class, 'update'])->name('ClienteUpdateCliServicios');

/**************************************************************************
Administrador de Clientes DATOS BASICOSClientesDatosBasicosController
//************************************************************************* */
Route::get('/add-cliente-datobasic', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'create'])->name('AddClienteDatoBasic');
Route::post('/insert-cliente-basicos', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'store'])->name('Insert-cliente-basicos');
Route::get('/buscar-cliente-basicos', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'busquedaClienteDtoBasico'])->name('BuscarClienteBasico');
Route::post('/clienteCli', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'editarCliente'])->name('ClienteEditarCli');
Route::post('/clienteCliUpdate/{idcliente}', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'update'])->name('ClienteUpdateCli');
Route::post('anulaRegistroBsc', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'anularRegistroBsc'])->name('AnulaRegistroBsc');
Route::post('validaDocumentoBsco', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'validaDocumento'])->name('ValidaDocumento');

//*********************************************************************
//      EMPLEADOS                                                *
//*********************************************************************/
Route::get('/empledadosIndex', [App\Http\Controllers\EmpleadosController::class, 'index'])->name('EmpleadosIndex');
Route::get('/empleadosCreate', [App\Http\Controllers\EmpleadosController::class, 'create'])->name('EmpleadosCreate');
Route::post('/empleadoStore', [App\Http\Controllers\EmpleadosController::class, 'store'])->name('EmpleadoStore');
Route::post('/empleadosUpdate', [App\Http\Controllers\EmpleadosController::class, 'update'])->name('EmpleadosUpdate');
Route::get('/empleadosListaShow', [App\Http\Controllers\EmpleadosController::class, 'show'])->name('EmpleadosListaShow');
Route::get('/buscarEmple', [App\Http\Controllers\EmpleadosController::class, 'busquedaEmpleado'])->name('BuscarEmplea');
Route::post('validaDocEmple', [App\Http\Controllers\EmpleadosController::class, 'validaDocEmpleado'])->name('ValidaDocEmpleado');
Route::post('anulaRegempleado', [App\Http\Controllers\EmpleadosController::class, 'destroy'])->name('AnulaRegempleado');


//*DATOS ADICIONALES
Route::get('/browsPais', [App\Http\Controllers\PaisController::class, 'index'])->name('BrowsPais');
Route::post('/browsDpto', [App\Http\Controllers\DepartamentosController::class, 'index'])->name('BrowsDpto');
Route::post('/browsCiudad', [App\Http\Controllers\CiudadesController::class, 'index'])->name('BrowsCiudad');
Route::get('/datosAuxiliarIndex', [App\Http\Controllers\DatosAuxiliaresCobtroller::class, 'index'])->name('DatosAuxiliarIndex');

/*EPS*/
Route::get('/epsCreate', [App\Http\Controllers\EmpresaRemitenteController::class, 'create'])->name('EpsCreate');
Route::post('/epsRemiteStore', [App\Http\Controllers\EmpresaRemitenteController::class, 'store'])->name('EpsRemiteStore');
Route::get('/epsListaShow',[App\Http\Controllers\EmpresaRemitenteController::class, 'show'])->name('EpsListaShow');
Route::post('/epsRemiteUpdate',[App\Http\Controllers\EmpresaRemitenteController::class, 'update'])->name('EpsRemiteUpdate');
Route::post('anulaRegistroEps', [App\Http\Controllers\EmpresaRemitenteController::class, 'anularRegistroEps'])->name('AnulaRegistroEps');

/*CARGOS*/
Route::get('/cargosCreate', [App\Http\Controllers\CargosController::class, 'create'])->name('CarCreate');
Route::post('/cargosStore', [App\Http\Controllers\CargosController::class, 'store'])->name('CarRemiteStore');
Route::get('/carListaShow',[App\Http\Controllers\CargosController::class, 'show'])->name('CarListaShow');
Route::post('/cargosUpdate',[App\Http\Controllers\CargosController::class, 'update'])->name('CarRemiteUpdate');
Route::post('/anulaRegistroCar', [App\Http\Controllers\CargosController::class, 'anularRegistroCar'])->name('AnulaRegistroCar');

//*********************************************************************
//                                 CITAS MEDICAS                      *
//*********************************************************************/
Route::get('/admin-citas-medicas', [App\Http\Controllers\CitasMedicasController::class, 'index'])->name('AdminCitasMedicas');
Route::get('/add-citas-medicas/{idDtoBasico}', [App\Http\Controllers\CitasMedicasController::class, 'create'])->name('AddCitasMedicas');
Route::post('/insert-cliente-citas', [App\Http\Controllers\CitasMedicasController::class, 'store'])->name('InsertClienteCitas');
Route::get('/buscar-cliente-citas', [App\Http\Controllers\CitasMedicasController::class, 'busquedaClienteCita'])->name('BuscarClienteCitas');
Route::post('/clienteCliUpdateCita/{idcliente}', [App\Http\Controllers\CitasMedicasController::class, 'update'])->name('ClienteUpdateCliCita');
Route::get('/admin-clientes-Citas', [App\Http\Controllers\CitasMedicasController::class, 'index'])->name('AdminClientesCitas');
//*********************************************************************
//                                EVOLUCION DIARIA               *
//*********************************************************************/
Route::get('/admin-evolucion-diaria', [App\Http\Controllers\EvolucionDiariaController::class, 'index'])->name('AdminEvolucionDiaria');
Route::get('/add-evolucion-diaria/{idEvDiaria}', [App\Http\Controllers\EvolucionDiariaController::class, 'create'])->name('AddCitasMedicasEvol');
Route::post('/insert-cliente-Evol', [App\Http\Controllers\EvolucionDiariaController::class, 'store'])->name('InsertClienteEvol');
Route::get('/buscar-CtrlMed', [App\Http\Controllers\EvolucionDiariaController::class, 'busquedaCtrlMed'])->name('BuscarControlMedico');
Route::post('/clienteUpdateEvol', [App\Http\Controllers\EvolucionDiariaController::class, 'update'])->name('ClienteUpdateEvol');
Route::post('/anula-CtrlMed', [App\Http\Controllers\EvolucionDiariaController::class, 'anularRegistro'])->name('anulaControlMedico');
// Route::get('/admin-clientes-Citas', [App\Http\Controllers\CitasMedicasController::class, 'index'])->name('AdminClientesCitas');

//*********************************************************************
//                               SIGNOS VITALES              *
//*********************************************************************/
Route::get('/admin-signos-vitales', [App\Http\Controllers\SignosVitalesController::class, 'index'])->name('AdminSignosVitale');
Route::get('/add-signos-vitales/{idEvDiaria}', [App\Http\Controllers\SignosVitalesController::class, 'create'])->name('AddSignosVitales');
Route::post('/insert-cliente-sv', [App\Http\Controllers\SignosVitalesController::class, 'store'])->name('InsertClienteSv');
Route::get('/helpSignosVitales', [App\Http\Controllers\SignosVitalesController::class, 'show'])->name('helpSignosVitales');

// /{idSingosV}
//*********************************************************************
//                                INVENTARIO              *
//*********************************************************************/
//          ARTICULOS
// Route::get('/admin-evolucion-diaria', [App\Http\Controllers\EvolucionDiariaController::class, 'index'])->name('AdminEvolucionDiaria');
Route::get('/inv_articulos', [App\Http\Controllers\InvArticulosController::class, 'create'])->name('InvArticuloCreate');
Route::post('/invArticulosStore', [App\Http\Controllers\InvArticulosController::class, 'store'])->name('invArticulosStore');
Route::get('/buscarArticulos_show', [App\Http\Controllers\InvArticulosController::class, 'show'])->name('BuscarArticulosShow');
// Route::post('/clienteUpdateEvol', [App\Http\Controllers\EvolucionDiariaController::class, 'update'])->name('ClienteUpdateEvol');
Route::post('/anulaArticulo', [App\Http\Controllers\InvArticulosController::class, 'destroy'])->name('AnulaArticuloInv');

// LINEAS
Route::get('/invLineasCreate', [App\Http\Controllers\InvLineasController::class, 'create'])->name('InvLineasCreate');
Route::post('/invLineasStore', [App\Http\Controllers\InvLineasController::class, 'store'])->name('InvLineasStore');
Route::post('/invLineasUpdate', [App\Http\Controllers\InvLineasController::class, 'update'])->name('InvLineasUpdate');
Route::get('/invlinListaShow', [App\Http\Controllers\InvLineasController::class, 'show'])->name('InvlinListaShow');
Route::post('/anulaRegistroLin', [App\Http\Controllers\InvLineasController::class, 'anularRegistroLin'])->name('AnulaRegistroLin');

// 

// CATEGORIAS
Route::get('/invCategoriasCreate', [App\Http\Controllers\InvCategoriasController::class, 'create'])->name('InvCategoriasCreate');
Route::post('/invCategoriaStore', [App\Http\Controllers\InvCategoriasController::class, 'store'])->name('InvCategoriaStore');
Route::post('/invCategoriaUpdate', [App\Http\Controllers\InvCategoriasController::class, 'update'])->name('InvCategoriaUpdate');
Route::get('/invCatListaShow', [App\Http\Controllers\InvCategoriasController::class, 'show'])->name('InvCategoriaShow');
Route::post('/anulaRegistroCate', [App\Http\Controllers\InvCategoriasController::class, 'anularRegistroCat'])->name('AnulaRegistroCate');

//  REQUISICIONES DE MEDICAMENTOS (CONTROLES MEDICOS)        *
//************************************************************/
Route::get('/admin_RequiMedicamento_user', [App\Http\Controllers\RequisicionMedicamentosController::class, 'index'])->name('RequisicionIndex|');
Route::get('/requisicion_create/{idUserRequi}', [App\Http\Controllers\RequisicionMedicamentosController::class, 'create'])->name('RequisicionCreate');
Route::post('/requisicion_store', [App\Http\Controllers\RequisicionMedicamentosController::class, 'store'])->name('RequisicionStore');
Route::get('/buscar-CtrlMed', [App\Http\Controllers\EvolucionDiariaController::class, 'busquedaCtrlMed'])->name('BuscarControlMedico');



//*********************************************************************
//                               CONTROLES MEDICOS              *
//*********************************************************************/
//          ADMINISTRACION DE MEDICAMENTOS

// Route::get('/buscar-CtrlMed', [App\Http\Controllers\EvolucionDiariaController::class, 'busquedaCtrlMed'])->name('BuscarControlMedico');
// Route::post('/clienteUpdateEvol', [App\Http\Controllers\EvolucionDiariaController::class, 'update'])->name('ClienteUpdateEvol');
// Route::post('/anula-CtrlMed', [App\Http\Controllers\EvolucionDiariaController::class, 'anularRegistro'])->name('anulaControlMedico');

//*********************************************************************
//CONTROLES MEDICOS - Asginación de los medicamentos permanentes      *
//*********************************************************************/
Route::get('/asignar-medicamentos/{idUserMed}', [App\Http\Controllers\AsignaMedicamentosController::class, 'create'])->name('AsignarMedicamentos');
Route::post('/store-asigna-medicamento', [App\Http\Controllers\AsignaMedicamentosController::class, 'store'])->name('StoreAsignaMedicamento');
Route::post('/show-asig-medic', [App\Http\Controllers\AsignaMedicamentosController::class, 'show'])->name('ShowAsigMedic');
Route::post('/show-asig-medic_perm', [App\Http\Controllers\AsignaMedicamentosController::class, 'buscar_asig'])->name('ShowAsigMedicPerm');

Route::post('/update-asig-medic', [App\Http\Controllers\AsignaMedicamentosController::class, 'update'])->name('UpdateAsigMedic');

//CONTROLES MEDICOS - Administrar medicamento permanetes  *
Route::get('/admin_medicamento_user', [App\Http\Controllers\AdministraMedPermanentesController::class, 'index'])->name('AdminMedicamentoUser');
Route::get('/admin-medicamentos_perm/{idUserMed}', [App\Http\Controllers\AdministraMedPermanentesController::class, 'create'])->name('AdminMedicamentosPerm');
Route::post('/store-medicamentos_perm', [App\Http\Controllers\AdministraMedPermanentesController::class, 'store'])->name('StoreMedicamentosPerm');


//*********************************************************************
//CONTROLES MEDICOS - Asginación de los medicamentos temporales     *
//*********************************************************************/
Route::get('/admin_medicamento_tempo', [App\Http\Controllers\AdminMedicUserController::class, 'index'])->name('AdminMedicamentoTempo');
Route::get('/add_medica_user/{idUserMed}', [App\Http\Controllers\AdminMedicUserController::class, 'create'])->name('AddMedicaUser');
Route::post('/insert_AdminMedicamento', [App\Http\Controllers\AdminMedicUserController::class, 'store'])->name('InsertAdminMedicamento');

//*********************************************************************
//CONTROLES MEDICOS - CREAR PLANILLA VACIA DE DESPOSICIONES                                   *
//*********************************************************************/
Route::get('/index_admin_deposiciones', [App\Http\Controllers\DeposicionPlanillaController::class, 'index'])->name('AdminDesposicionesUser');
Route::get('/create_planilla_deposiciones/{idUserMed}', [App\Http\Controllers\DeposicionPlanillaController::class, 'create'])->name('CreatePlanillaDeposiciones');
Route::post('/buscar_planillas', [App\Http\Controllers\DeposicionPlanillaControllerer::class, 'buscar_planillas'])->name('BuscarPlanillas');
Route::post('/store-planilla', [App\Http\Controllers\DeposicionPlanillaController::class, 'store'])->name('StorePlanilla');
Route::post('/deposiciones-destroy-planilla', [App\Http\Controllers\DeposicionPlanillaController::class, 'destroy'])->name('DeposcionesDestroyPlanilla');

//*********************************************************************
//CONTROLES MEDICOS - ADD LLENAR CTROL DESPOSICIONES CON LOS DÍAS     *
//*********************************************************************/
Route::get('/create_add_deposiciones/{idUserMed}', [App\Http\Controllers\DeposicionesController::class, 'create'])->name('CreateAddDeposiciones');
Route::post('/store-dia-planilla', [App\Http\Controllers\DeposicionesController::class, 'store'])->name('StoreDiaPlanilla');
Route::post('/buscar-plani-depo', [App\Http\Controllers\DeposicionesController::class, 'buscarPlaniDepo'])->name('BuscarPlaniDepo');
Route::post('/buscar-add-plani_dia', [App\Http\Controllers\DeposicionesController::class, 'buscarAddPlanillas'])->name('BuscaraDDPlaniDepo');
Route::post('/destroy-dia-plani', [App\Http\Controllers\DeposicionesController::class, 'destroy'])->name('DestryDiaPlani');

//*********************************************************************
//CONTROLES MEDICOS - CONTROL DE GLUCOMETRIA                          *
//*********************************************************************/
Route::get('/index_admin_glucometria', [App\Http\Controllers\CtlGlucometriaController::class, 'index'])->name('AdminGlucometriaUser');
Route::get('/create-ctrglucometria/{idUserMed}', [App\Http\Controllers\CtlGlucometriaController::class, 'create'])->name('CreateCtrGlucometria');
Route::post('/store-ctrglucometria', [App\Http\Controllers\CtlGlucometriaController::class, 'store'])->name('storeCtrGlucometria');
Route::post('/show-ctrglucometria', [App\Http\Controllers\CtlGlucometriaController::class, 'show'])->name('ShowCtrGlucometria');
Route::post('/destroy-ctrglucometria', [App\Http\Controllers\CtlGlucometriaController::class, 'destroy'])->name('DestroyCtrGlucometria');

//*********************************************************************
//CONTROLES MEDICOS - CONTROL DE VISITAS DE PROFESIONALES                         *
//*********************************************************************/
Route::get('/index_visitas_pro', [App\Http\Controllers\VisitaProfesionalesController::class, 'index'])->name('VisitasProfesionales');
Route::get('/create-visitas-pro/{idUserMed}', [App\Http\Controllers\VisitaProfesionalesController::class, 'create'])->name('CreateVisitasPro');
Route::post('/store-visita-pro', [App\Http\Controllers\VisitaProfesionalesController::class, 'store'])->name('storeVisitaPro');
Route::post('/show-visita', [App\Http\Controllers\VisitaProfesionalesController::class, 'show'])->name('ShowVisitas');
Route::post('/destroy-visita-pro', [App\Http\Controllers\VisitaProfesionalesController::class, 'destroy'])->name('DestroyVisitaPro');

//*********************************************************************
//CONTROLES MEDICOS - CONTROL DE SEGUIMIENTO A TERAPIAS                         *
//*********************************************************************/
/*En esta tabla (terapi_actividad) se ingresan la programación de las sesiones de terapias y/o actividades*/
/********************************************************************************************* */
Route::get('/create-terapia/{idUserMed}', [App\Http\Controllers\TerapiaActividadController::class, 'create'])->name('CreateTerapia');
Route::post('/store-terapia', [App\Http\Controllers\TerapiaActividadController::class, 'store'])->name('StoreTerapia');
Route::post('/show-terapia', [App\Http\Controllers\TerapiaActividadController::class, 'show'])->name('ShowTerapia');
Route::post('/destroy-terapia', [App\Http\Controllers\TerapiaActividadController::class, 'destroy'])->name('DestroyTerapia');

/*En esta Tabla (seguimto_terapia) se ingresan las terapias o actividades realizadas*/
Route::get('/index-seguimto-terapia', [App\Http\Controllers\SeguimtoTerapiaController::class, 'index'])->name('IndexSeguimtoTerapia');
Route::get('/create-seguimto-terapia/{idUserMed}', [App\Http\Controllers\SeguimtoTerapiaController::class, 'create'])->name('CreateSeguimtoTerapia');
Route::post('/store-seguimto-terapia', [App\Http\Controllers\SeguimtoTerapiaController::class, 'store'])->name('StoreSeguimtoTerapia');
Route::post('/show-seguimto-terapia', [App\Http\Controllers\SeguimtoTerapiaController::class, 'show'])->name('ShowSeguimtoTerapia');
Route::post('/destroy-seguimto-terapia', [App\Http\Controllers\SeguimtoTerapiaController::class, 'destroy'])->name('DestroySeguimtoTerapia');

//https://www.youtube.com/watch?v=e0jcxoAI-0c guardar multiples registro
//*********************************************************************
//                               CONTABILIDAD                         *
//*********************************************************************/
//          CONSECUTIVO de documentos
Route::post('/busca_consecutivo', [App\Http\Controllers\ConsecutivosController::class, 'buscaConsecutivo'])->name('BuscaConsecutivo');



// Route::get('/inv_articulos_create', function() {
//     return view('backend.inventario.articulos');
// });
Route::get('/imagen', function() {
    return view('backend.cliente.imagen');
});
Route::get('/datatable', function() {
    return view('backend.cliente.datatable');
});

