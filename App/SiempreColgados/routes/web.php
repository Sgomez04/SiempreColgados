<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TareaController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\HomeController;




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
Route::get('/', function(){
    return view('Inicio.loginE');
})->middleware('guest');;


// //-- LOGIN -- //
// Route::get('login', [Auth::class, 'showLoginForm'])->name('login');
// Route::post('login', [Auth::class, 'showLoginForm'])->name('login');
// Route::post('logout', [Auth::class, 'logout'])->name('logout');
// Route::get('password/reset/{token}', [Auth::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [Auth::class, 'reset'])->name('password.update');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');


//-- CLIENTES -- //
Route::get('/clientes/eliminarCi/{id}', [ClienteController::class, 'destroy'])->name('eliminarCi')->middleware('auth.Admin');
Route::get('/clientes/userCuotas/{id_cuota}', [ClienteController::class, 'UserCuotas'])->name('userCuotas')->middleware('auth.Admin');
Route::resource("clientes", ClienteController::class)->middleware('auth.Admin');

//-- CUOTAS -- //
Route::get('/factura/printInvoice/{id_cliente}', [CuotaController::class, 'printInvoice'])->name('printInvoice')->middleware('auth.Admin');
Route::get('/cuotas/createE', [CuotaController::class, 'createE'])->name('createE')->middleware('auth.Admin');
Route::post('/cuotas/storeE', [CuotaController::class, 'storeE'])->name('storeE')->middleware('auth.Admin');
Route::get('/cuotas/eliminarC/{id}', [CuotaController::class, 'destroy'])->name('eliminarC')->middleware('auth.Admin');
Route::resource("cuotas", CuotaController::class)->middleware('auth.Admin');

//-- EMPLEADOS -- //
Route::get('/empleados/eliminarE/{id}', [EmpleadoController::class, 'destroy'])->name('eliminarE')->middleware('auth.Admin');
Route::resource("empleados", EmpleadoController::class)->middleware('auth.Admin');

//-- TAREAS -- //
Route::get('/tareas/tareasOP', [TareaController::class, 'listTareaOP'])->name('tareasOP')->middleware('auth.Operario');
Route::get('/tareas/tareasOPedit{id}', [TareaController::class, 'editTareaOP'])->name('tareasOPedit')->middleware('auth.Operario');
Route::get('/tareas/tareaClient', [TareaController::class, 'createClient'])->name('tareaClient')->middleware('guest');
Route::post('/tareas/tareaClientCreate', [TareaController::class, 'storeClient'])->name('tareaClientCreate')->middleware('guest');
Route::get('/tareas/eliminarT/{id}', [TareaController::class, 'destroy'])->name('eliminarT')->middleware('auth.Admin');
Route::resource("tareas", TareaController::class)->middleware('auth.Admin');

//-- PERFIL -- //
Route::resource("perfil", PerfilController::class)->middleware('auth');
