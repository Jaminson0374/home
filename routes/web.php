<?php
use App\Http\controller\backend\ClientesController;
use App\Http\Controllers\backend\TipoDocumentoController;
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
Route::get('/', [App\Http\Controllers\backend\UserController::class, 'AddUserIndex'])->name('AddUserIndex');

Route::post('/insert-user', [App\Http\Controllers\backend\UserController::class, 'InsertUser'])->name('InsertUser');

Route::get('/edit-user/{id}', [App\Http\Controllers\backend\UserController::class, 'EditUser'])->name('EditUser');

Route::post('/update-user/{id}', [App\Http\Controllers\backend\UserController::class, 'UpdateUser'])->name('UpdateUser');

Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'DeleteUser'])->name('DeleteUser');


//Administrador de servicios (php artisan make:contoller TipoServicioContrller --model=Photo --resource])
Route::get('/all-tipo-servicio', [App\Http\Controllers\backend\TipoServicioController::class, 'AllTipoServicio'])->name('AllTipoServicio');

Route::get('/tipo-servicio', [App\Http\Controllers\backend\TipoServicioController::class, 'TipoServicio'])->name('TipoServicio');

//Administrador de Clientes
//Route::get('/all-cliente-admin', [App\Http\Controllers\backend\ClientesController::class, 'AllClienteAdmin'])->name('AllClienteAdmin');

Route::get('/admin-clientes', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'index'])->name('AdminClientes');

Route::get('/admin-prueba', function() {
    return view('backend.cliente.admin-clientes');
});

Route::get('/add-cliente-servicio', [App\Http\Controllers\backend\ClientesController::class, 'AddClienteIndex'])->name('AddClienteIndex');

Route::get('/tipo-servicio', [App\Http\Controllers\backend\ClientesController::class, 'TipoServicio'])->name('TipoServicio');

Route::post('/insert-cliente', [App\Http\Controllers\backend\ClientesController::class, 'store'])->name('InsertCliente');

Route::get('/edit-cliente/{id}', [App\Http\Controllers\backend\ClientesController::class, 'EditCliente'])->name('EditCliente');

Route::post('/update-cliente/{id}', [App\Http\Controllers\backend\ClientesController::class, 'UpdateCliente'])->name('UpdateCliente');

Route::get('/delete-cliente/{id}', [App\Http\Controllers\backend\ClientesController::class, 'DeleteCliente'])->name('DeleteCliente');


//Administrador de Clientes DATOS BASICOSClientesDatosBasicosController

Route::get('/add-cliente-datobasic', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'create'])->name('AddClienteDatoBasic');

Route::post('/insert-cliente-basicos', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'store'])->name('InsertClienteBasico');
Route::get('/buscar-cliente-basicos', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'busquedaClienteDtoBasico'])->name('BuscarClienteBasico');
Route::post('/clienteCli', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'editarCliente'])->name('ClienteEditarCli');
Route::post('/clienteCliUpdate/{idcliente}', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'update'])->name('ClienteUpdateCli');


Route::get('/browsPais', [App\Http\Controllers\PaisController::class, 'index'])->name('BrowsPais');
Route::post('/browsDpto', [App\Http\Controllers\DepartamentosController::class, 'index'])->name('BrowsDpto');
Route::post('/browsCiudad', [App\Http\Controllers\CiudadesController::class, 'index'])->name('BrowsCiudad');


//Administrador de RESERVAS
  
Route::get('/admin-reservas', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'index'])->name('AdminReservas');

Route::get('/open-reservas-servicios', [App\Http\Controllers\backend\ClientesController::class, 'openReservasAddServicios'])->name('openReservasAddServicios');

// Route::get('/imagen', function() {
//   return view('backend.cliente.imagen');
// })

Route::get('/imagen', function() {
    return view('backend.cliente.imagen');
});