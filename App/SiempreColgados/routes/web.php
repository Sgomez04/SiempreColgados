<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TareaController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
// use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//<------------ RUTAS SIN LOGIN ------------>//

// //-- INICIO -- //
// Route::get('/', [TareaController::class, 'index']);

// //-- CLIENTES -- //
// Route::get('/clientes/eliminarCi/{id}', [ClienteController::class, 'destroy'])->name('eliminarCi');
// Route::get('/clientes/userCuotas/{id_cuota}', [ClienteController::class, 'UserCuotas'])->name('userCuotas');
// Route::resource("clientes", ClienteController::class);

// //-- CUOTAS -- //
// Route::get('/factura/printInvoice/{id_cliente}', [CuotaController::class, 'printInvoice'])->name('printInvoice');
// Route::get('/cuotas/createE', [CuotaController::class, 'createE'])->name('createE');
// Route::post('/cuotas/storeE', [CuotaController::class, 'storeE'])->name('storeE');
// Route::get('/cuotas/eliminarC/{id}', [CuotaController::class, 'destroy'])->name('eliminarC');
// Route::resource("cuotas", CuotaController::class);

// //-- EMPLEADOS -- //
// Route::get('/empleados/eliminarE/{id}', [EmpleadoController::class, 'destroy'])->name('eliminarE');
// Route::resource("empleados", EmpleadoController::class);

// //-- TAREAS -- //
// Route::get('/tareas/tareaC', [TareaController::class, ''])->name('tareaC');
// Route::get('/tareas/eliminarT/{id}', [TareaController::class, 'destroy'])->name('eliminarT');
// Route::resource("tareas", TareaController::class);

// //-- LOGIN -- //


//<------------ RUTAS CON LOGIN ------------>//

// //-- INICIO -- //
Route::get('/', function () {
    return view('index');
});

// //-- LOGIN -- //
Route::get('login', [Auth::class, 'showLoginForm'])->name('login');
Route::post('login', [Auth::class, 'showLoginForm'])->name('login');
Route::post('logout', [Auth::class, 'logout'])->name('logout');
Route::get('password/reset/{token}', [Auth::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [Auth::class, 'reset'])->name('password.update');
Auth::routes();

//-- CLIENTES -- //
Route::get('/clientes/eliminarCi/{id}', [ClienteController::class, 'destroy'])->name('eliminarCi')->middleware('auth');
Route::get('/clientes/userCuotas/{id_cuota}', [ClienteController::class, 'UserCuotas'])->name('userCuotas')->middleware('auth');
Route::resource("clientes", ClienteController::class)->middleware('auth');

//-- CUOTAS -- //
Route::get('/factura/printInvoice/{id_cliente}', [CuotaController::class, 'printInvoice'])->name('printInvoice')->middleware('auth');
Route::get('/cuotas/createE', [CuotaController::class, 'createE'])->name('createE')->middleware('auth');
Route::post('/cuotas/storeE', [CuotaController::class, 'storeE'])->name('storeE')->middleware('auth');
Route::get('/cuotas/eliminarC/{id}', [CuotaController::class, 'destroy'])->name('eliminarC')->middleware('auth');
Route::resource("cuotas", CuotaController::class)->middleware('auth');

//-- EMPLEADOS -- //
Route::get('/empleados/eliminarE/{id}', [EmpleadoController::class, 'destroy'])->name('eliminarE')->middleware('auth');
Route::resource("empleados", EmpleadoController::class);

//-- TAREAS -- //
Route::get('/tareas/eliminarT/{id}', [TareaController::class, 'destroy'])->name('eliminarT')->middleware('auth');
Route::resource("tareas", TareaController::class);
