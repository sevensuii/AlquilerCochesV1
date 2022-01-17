<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use Carbon\Carbon;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('clientes', [ClienteController::class, 'index']);
// Route::get('clientes/edit', [ClienteController::class, 'edit']);

Route::get("clientes/pdf",[ClienteController::class, 'listadoPdf'])->name('clientes.pdf');
Route::resource('clientes', 'App\Http\Controllers\ClienteController');

Route::resource('coches', 'App\Http\Controllers\CocheController');