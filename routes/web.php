<?php

use App\Http\Controllers\EstadioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\ResultadoPartidoController;
use App\Http\Controllers\SeleccionController;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

/****** RUTAS GET PARA OBTENER VISTAS DE MODULOS */

Route::middleware(['auth'])->group(function() {

    // Home

    Route::controller(HomeController::class)->group(function() {
        Route::redirect('/', '/dashboard');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    // Selecciones

    Route::controller(SeleccionController::class)->group(function() {
        Route::get('/ver-selecciones', 'index')->name('ver-selecciones');
        Route::get('/ver-grupos', 'verModuloGrupos')->name('ver-grupos');
        Route::get('/ver-calendario', 'verCalendario')->name('ver-calendario');
    });

    // Estadios

    Route::controller(EstadioController::class)->group(function() {
        Route::get('/ver-sedes', 'verEstadios')->name('ver-sedes');
    });

    // Partidos y resultados

    Route::controller(ResultadoPartidoController::class)->group(function() {
        Route::get('/ver-quiniela/{jornada?}/{message?}', 'verQuiniela')->name('ver-quiniela');
        Route::get('/ver-tabla-resultados', 'verTablaResultados')->name('ver-tabla-resultados');
        
        Route::post('/guardar-predicciones-form', 'guardarPrediccionesForm')->name('guardar-predicciones-form');
    });

    Route::controller(PremioController::class)->group(function() {
        Route::get('/ver-tabla-premios', 'verTablaPremios')->name('ver-tabla-premios');
    });

});

Route::middleware(['guest'])->group(function() {

    // Participantes inscritos

    Route::controller(PartidoController::class)->group(function() {
        Route::get('/participantes', 'verParticipantes')->name('ver-participantes');
    });

});

Route::controller(ResultadoPartidoController::class)->group(function() {

    Route::get('/actualizar-puntos-usuarios', 'actualizarPuntosParticipantesALL');

});


require __DIR__.'/auth.php';
