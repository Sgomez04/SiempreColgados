<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TareaController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IndexController;

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

//-- INICIO -- //
Route::get('/', [TareaController::class, 'index']);

//-- CLIENTES -- //
Route::get('/clientes/eliminarCi/{id}', [ClienteController::class, 'destroy'])->name('eliminarCi');
Route::get('/clientes/userCuotas/{id_cuota}', [ClienteController::class, 'UserCuotas'])->name('userCuotas');
Route::resource("clientes", ClienteController::class);

//-- CUOTAS -- //
Route::get('/factura/printInvoice/{id_cliente}', [CuotaController::class, 'printInvoice'])->name('printInvoice');
Route::get('/cuotas/createE', [CuotaController::class, 'createE'])->name('createE');
Route::post('/cuotas/storeE', [CuotaController::class, 'storeE'])->name('storeE');
Route::get('/cuotas/eliminarC/{id}', [CuotaController::class, 'destroy'])->name('eliminarC');
Route::resource("cuotas", CuotaController::class);

//-- EMPLEADOS -- //
Route::get('/empleados/eliminarE/{id}', [EmpleadoController::class, 'destroy'])->name('eliminarE');
Route::resource("empleados", EmpleadoController::class);

//-- TAREAS -- //
Route::get('/tareas/tareaC', [TareaController::class, ''])->name('tareaC');
Route::get('/tareas/eliminarT/{id}', [TareaController::class, 'destroy'])->name('eliminarT');
Route::resource("tareas", TareaController::class);

//-- LOGIN -- //


//<------------ RUTAS CON LOGIN ------------>//

// //-- INICIO -- //
// Route::get('/', [LoginController::class, 'index'])->middleware('guest');

// //-- CLIENTES -- //
// Route::get('/clientes/eliminarCi/{id}', [ClienteController::class, 'destroy'])->name('eliminarCi')->middleware('auth');
// Route::get('/clientes/userCuotas/{id_cuota}', [ClienteController::class, 'UserCuotas'])->name('userCuotas')->middleware('auth');
// Route::resource("clientes", ClienteController::class)->middleware('auth');

// //-- CUOTAS -- //
// Route::get('/factura/printInvoice/{id_cliente}', [CuotaController::class, 'printInvoice'])->name('printInvoice')->middleware('auth');
// Route::get('/cuotas/createE', [CuotaController::class, 'createE'])->name('createE')->middleware('auth');
// Route::post('/cuotas/storeE', [CuotaController::class, 'storeE'])->name('storeE')->middleware('auth');
// Route::get('/cuotas/eliminarC/{id}', [CuotaController::class, 'destroy'])->name('eliminarC')->middleware('auth');
// Route::resource("cuotas", CuotaController::class)->middleware('auth');

// //-- EMPLEADOS -- //
// Route::get('/empleados/eliminarE/{id}', [EmpleadoController::class, 'destroy'])->name('eliminarE')->middleware('auth');
// Route::resource("empleados", EmpleadoController::class)->middleware('auth');

// //-- TAREAS -- //
// Route::get('/tareas/eliminarT/{id}', [TareaController::class, 'destroy'])->name('eliminarT')->middleware('auth');
// Route::resource("tareas", TareaController::class)->middleware('auth');

// //-- INICIO -- //
Route::get('/inicio/accessE', [LoginController::class, 'accessE'])->name('accessE')->middleware('guest');
Route::get('/inicio/accessC', [LoginController::class, 'accessC'])->name('accessC')->middleware('guest');
Route::get('/inicio/indexE', [LoginController::class, 'indexE'])->name('indexE')->middleware('guest');
Route::get('/inicio/indexC', [LoginController::class, 'indexC'])->name('indexC')->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource("inicio", LoginController::class);
