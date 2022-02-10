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


Route::resource("clientes", ClienteController::class);

Route::get('/cuotas/createE', [CuotaController::class, 'createE'])->name('createE');
Route::post('/cuotas/storeE', [CuotaController::class, 'storeE'])->name('storeE');
Route::get('/cuotas/userCuotas{id}', [CuotaController::class, 'UserCuotas'])->name('userCuotas');
Route::resource("cuotas", CuotaController::class);


Route::resource("empleados", EmpleadoController::class);

Route::resource("tareas", TareaController::class);

