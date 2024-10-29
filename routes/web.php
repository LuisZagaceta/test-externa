<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "web" middleware group. Make something great!
  |
 */

Route::get('/', function () {
    return view('login');
})->name('login');

//Route::middleware('auth:sanctum')->get('/tareas', [TareasController::class, 'index']);
//Route::middleware('auth')->get('/tareas', [TareasController::class, 'index']);

Route::get('/tareas', [TareasController::class, 'index']);
Route::get('/tareas/nuevo', [TareasController::class, 'nuevo']);
Route::get('/tareas/editar/{id}', [TareasController::class, 'show']);
