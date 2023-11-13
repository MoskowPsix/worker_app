<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/workers',[\App\Http\Controllers\WorkerController::class, 'index'] );
Route::get('/workers/show/{id}',[\App\Http\Controllers\WorkerController::class, 'show'] );
Route::get('/workers/create',[\App\Http\Controllers\WorkerController::class, 'create'] );
Route::get('/workers/update/{worker}',[\App\Http\Controllers\WorkerController::class, 'update'] );
Route::get('/workers/delete/{id}',[\App\Http\Controllers\WorkerController::class, 'delete'] );
