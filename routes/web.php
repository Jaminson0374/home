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
Route::get('/buscarClienteUser', [App\Http\Controllers\backend\ClientesController::class, 'buscarCliUser'])->name('BuscarClienteUser');

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
Route::get('/admin_medicamento_user', [App\Http\Controllers\AdminMedicUserController::class, 'index'])->name('AdminMedicamentoUser');
Route::get('/add_medica_user/{idUserMed}', [App\Http\Controllers\AdminMedicUserController::class, 'create'])->name('AddMedicaUser');
Route::post('/insert_AdminMedicamento', [App\Http\Controllers\AdminMedicUserController::class, 'store'])->name('InsertAdminMedicamento');
// Route::get('/buscar-CtrlMed', [App\Http\Controllers\EvolucionDiariaController::class, 'busquedaCtrlMed'])->name('BuscarControlMedico');
// Route::post('/clienteUpdateEvol', [App\Http\Controllers\EvolucionDiariaController::class, 'update'])->name('ClienteUpdateEvol');
// Route::post('/anula-CtrlMed', [App\Http\Controllers\EvolucionDiariaController::class, 'anularRegistro'])->name('anulaControlMedico');

//*********************************************************************
//CONTROLES MEDICOS - Asginación de los medicamentos permanentes      *
//*********************************************************************/
Route::get('/asignar-medicamentos/{idUserMed}', [App\Http\Controllers\AsignaMedicamentosController::class, 'create'])->name('AsignarMedicamentos');
Route::post('/store-asigna-medicamento', [App\Http\Controllers\AsignaMedicamentosController::class, 'store'])->name('StoreAsignaMedicamento');
// asignar_medicamentos.blade


//*********************************************************************
//                               CONTABILIDAD                         *
//*********************************************************************/
//          CONSECUTIVO de documentos
Route::post('/busca_consecutivo', [App\Http\Controllers\ConsecutivosController::class, 'buscaConsecutivo'])->name('BuscaConsecutivo');
// Route::get('/add_medica_user/{idUserMed}', [App\Http\Controllers\AdminMedicUserController::class, 'create'])->name('AddMedicaUser');
// Route::post('/insert_AdminMedicamento', [App\Http\Controllers\AdminMedicUserController::class, 'store'])->name('InsertAdminMedicamento');
// Route::get('/buscar-CtrlMed', [App\Http\Controllers\EvolucionDiariaController::class, 'busquedaCtrlMed'])->name('BuscarControlMedico');
// Route::post('/clienteUpdateEvol', [App\Http\Controllers\EvolucionDiariaController::class, 'update'])->name('ClienteUpdateEvol');
// Route::post('/anula-CtrlMed', [App\Http\Controllers\EvolucionDiariaController::class, 'anularRegistro'])->name('anulaControlMedico');





// Route::get('/inv_articulos_create', function() {
//     return view('backend.inventario.articulos');
// });
Route::get('/imagen', function() {
    return view('backend.cliente.imagen');
});
Route::get('/datatable', function() {
    return view('backend.cliente.datatable');
});

