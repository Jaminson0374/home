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
//Route::get('/all-cliente', [App\Http\Controllers\backend\ClientesController::class, 'AllCliente'])->name('allCliente');

Route::get('/add-cliente-index', [App\Http\Controllers\backend\ClientesController::class, 'AddClienteIndex'])->name('AddClienteIndex');

Route::get('/tipo-servicio', [App\Http\Controllers\backend\ClientesController::class, 'TipoServicio'])->name('TipoServicio');

//Route::get('/add-cliente-datobasic', [App\Http\Controllers\backend\ClientesController::class, 'AddClienteDatoBasic'])->name('AddClienteDatoBasic');

Route::post('/insert-cliente', [App\Http\Controllers\backend\ClientesController::class, 'store'])->name('InsertCliente');

Route::get('/edit-cliente/{id}', [App\Http\Controllers\backend\ClientesController::class, 'EditCliente'])->name('EditCliente');

Route::post('/update-cliente/{id}', [App\Http\Controllers\backend\ClientesController::class, 'UpdateCliente'])->name('UpdateCliente');

Route::get('/delete-cliente/{id}', [App\Http\Controllers\backend\ClientesController::class, 'DeleteCliente'])->name('DeleteCliente');


//Administrador de Clientes DATOS BASICOSClientesDatosBasicosController
Route::get('/all-cliente-basico', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'index'])->name('AllClienteBasico');

// Route::get('/tipo-servicio', [App\Http\Controllers\backend\clientes_datos_basicos\ClientesDatosBasicosController::class, 'TipoServicio'])->name('TipoServicio');

Route::get('/add-cliente-datobasic', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'create'])->name('AddClienteDatoBasic');

Route::post('/insert-cliente-basicos', [App\Http\Controllers\backend\ClientesDatosBasicosController::class, 'store'])->name('InsertClienteBasico');

// Route::get('/edit-cliente/{id}', [App\Http\Controllers\backend\clientes_datos_basicos\ClientesDatosBasicosController::class, 'EditCliente'])->name('EditCliente');

// Route::post('/update-cliente/{id}', [App\Http\Controllers\backend\clientes_datos_basicos\ClientesDatosBasicosController::class, 'UpdateCliente'])->name('UpdateCliente');

// Route::get('/delete-cliente/{id}', [App\Http\Controllers\backend\clientes_datos_basicos\ClientesDatosBasicosController::class, 'DeleteCliente'])->name('DeleteCliente');
