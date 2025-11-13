<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\SeleccionController;
use App\Http\Controllers\ResultadoPartidoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPushTokenController;
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

// Auth

Route::middleware('api.key')->controller(ApiAuthController::class)->group(function() {
    Route::post('login', 'login');
});

// Rutas protegidas

Route::middleware(['auth:sanctum'])->group(function() {

    Route::controller(ApiAuthController::class)->group(function() {
        Route::delete('logout', 'logout');
        Route::delete('logout-all', 'logoutAll');
    });

    // Equipos

    Route::controller(EquipoController::class)->group(function() {
        Route::get('equipos', 'getEquipos');
    });

    // Grupos

    Route::controller(GrupoController::class)->group(function() {
        Route::get('grupos', 'getGrupos');
        Route::get('grupos/{grupo}/equipos', 'getEquiposGrupo');
    });

    // Partidos

    Route::controller(PartidoController::class)->group(function() {
        Route::get('jornadas', 'getJornadas');
        Route::get('jornadas/{jornada}/partidos', 'getPartidosJornada');
    });

    // Estadios

    Route::controller(EstadioController::class)->group(function() {
        Route::get('estadios', 'getEstadios');
    });

    // Users

    Route::controller(UserController::class)->group(function() {
        Route::get('users', 'getUsers');
        Route::get('users/{id}', 'getUser');
        Route::get('ranking', 'getRanking');
    });

    Route::controller(UserPushTokenController::class)->group(function() {
        Route::post('users/{id}/push-tokens', 'store');
    });

    // Premios

    Route::controller(PremioController::class)->group(function() {
        Route::get('premios', 'getPremios');
    });

});

