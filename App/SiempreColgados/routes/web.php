<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TareaController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;





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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TareaController::class, 'index']);
// Route::get('/tareas', [TareaControl::class, 'index']);
// Route::get('/cuotas', [CuotasControl::class, 'index']);
// Route::get('/empleados', [EmpleadoControl::class, 'index']);
// Route::get('/clientes', [ClienteControl::class, 'index']);


Route::resource("clientes", ClienteController::class)
    ->parameters(["clientes" => "cliente"]);

Route::resource("cuotas", CuotaController::class)
    ->parameters(["cuotas" => "cuota"]);

Route::resource("empleados", EmpleadoController::class)
    ->parameters(["empleados" => "empleado"]);

Route::resource("tareas", TareaController::class)
    ->parameters(["tareas" => "tarea"]);
