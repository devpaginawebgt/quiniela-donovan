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

Route::controller(ApiAuthController::class)->group(function() {
    Route::post('login', 'login');
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

// Participantes

Route::controller(UserController::class)->group(function() {
    Route::get('participantes', 'getParticipantes');
    Route::get('ranking', 'getRanking');
});

// Premios

Route::controller(PremioController::class)->group(function() {
    Route::get('premios', 'getPremios');
});



