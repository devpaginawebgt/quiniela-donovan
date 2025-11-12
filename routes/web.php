<?php

use App\Http\Controllers\EstadioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\ResultadoPartidoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // Home

    Route::controller(HomeController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    // Selecciones

    Route::controller(EquipoController::class)->group(function() {
        Route::get('/ver-selecciones', 'index')->name('ver-selecciones');
        Route::get('/ver-grupos', 'verModuloGrupos')->name('ver-grupos');
        Route::get('/ver-calendario', 'verCalendario')->name('ver-calendario');

        Route::get('/ver-grupo/{grupo_get}', 'equiposGrupo');
        Route::post('/partidos-grupo', 'partidosGrupo');
        Route::get('/partidos-jornada/{jornada}', 'partidosJornada');
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

        Route::post('/guardar-predicciones/', 'guardarPredicciones');
        Route::post('/obtener-predicciones/', 'obtenerPrediccionesGuardadas');
        Route::get('/obtener-tabla-participantes/{user_id}', 'obtenerParticipantes');
    });

    // Premios

    Route::controller(PremioController::class)->group(function() {
        Route::get('/ver-tabla-premios', 'verTablaPremios')->name('ver-tabla-premios');
    });
    

    // Rutas para super-admin

    Route::controller(ResultadoPartidoController::class)->group(function() {

        Route::get('/actualizar-puntos-usuarios', 'actualizarPuntosParticipantesALL');

    });

});

Route::middleware(['guest'])->group(function() {

    // Participantes inscritos

    Route::controller(UserController::class)->group(function() {
        Route::get('/participantes', 'verParticipantes')->name('ver-participantes');
    });

});

// Los metodos post se cambiaron a put porque el servidor donde se alojara la aplicacion no permite post


require __DIR__.'/auth.php';
