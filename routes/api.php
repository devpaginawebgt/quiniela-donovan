<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SeleccionController;
use App\Http\Controllers\ResultadoPartidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// middleware('auth:sanctum')

Route::controller(ApiAuthController::class)->group(function() {
    Route::get('login', 'login');
});

Route::controller(EquipoController::class)->group(function() {
    Route::get('equipos', 'getEquipos');
});

