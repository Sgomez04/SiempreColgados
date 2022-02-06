<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TareaControl;
use App\Http\Controllers\CuotaControl;
use App\Http\Controllers\EmpleadoControl;
use App\Http\Controllers\ClienteControl;





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

Route::get('/', [TareaControl::class, 'index']);
Route::get('/tareas', [TareaControl::class, 'index']);
Route::get('/cuotas', [CuotasControl::class, 'index']);
Route::get('/empleados', [EmpleadoControl::class, 'index']);
Route::get('/clientes', [ClienteControl::class, 'index']);


Route::resource("clientes", ClienteControl::class)
    ->parameters(["clientes" => "cliente"]);

Route::resource("cuotas", CuotaControl::class)
    ->parameters(["cuotas" => "cuota"]);

Route::resource("empleados", EmpleadoControl::class)
    ->parameters(["empleados" => "empleado"]);

Route::resource("tareas", TareaControl::class)
    ->parameters(["tareas" => "tarea"]);
