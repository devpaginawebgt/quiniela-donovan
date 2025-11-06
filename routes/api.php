<?php

use App\Http\Controllers\SeleccionController;
use App\Http\Controllers\ResultadoPartidoController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Los metodos post se cambiaron a put porque el servidor donde se alojara la aplicacion no permite post
Route::get('/ver-grupo/{grupo_get}', [SeleccionController::class, 'equiposGrupo'] );
Route::put('/partidos-grupo', [SeleccionController::class, 'partidosGrupo'] );
Route::get('/partidos-jornada/{jornada}', [SeleccionController::class, 'partidosJornada'] );


Route::put('/guardar-predicciones/', [ResultadoPartidoController::class, 'guardarPredicciones'] );


Route::put('/obtener-predicciones/', [ResultadoPartidoController::class, 'obtenerPrediccionesGuardadas'] );
Route::get('/test/{user_id}', [ResultadoPartidoController::class, 'testPerformance'] );

Route::get('/obtener-tabla-participantes/{user_id}', [ResultadoPartidoController::class, 'obtenerParticipantes'] );