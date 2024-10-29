<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginApi;
use App\Http\Controllers\Api\TareasApi;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "api" middleware group. Make something great!
  |
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginApi::class, 'login']);
Route::get('/tareas', [TareasApi::class, 'index']);
Route::get('/tareas/crear', [TareasApi::class, 'index']);


Route::post('/tareas/crear', [TareasApi::class, 'create']);
Route::post('/tareas/editar/{id}', [TareasApi::class, 'update']);
Route::delete('/tareas/delete/{id}', [TareasApi::class, 'delete']);