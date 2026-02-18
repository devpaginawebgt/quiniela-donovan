<?php

namespace App\Http\Controllers;

use App\Http\Requests\Prediccion\PrediccionRequest;
use App\Http\Resources\Prediccion\PrediccionResource;
use App\Http\Resources\Prediccion\PrediccionSolicitudResource;
use App\Http\Resources\Resultado\ResultadoResource;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PartidoService;
use App\Http\Services\PrediccionService;
use App\Traits\ApiResponse;

class ResultadoPartidoController extends Controller
{
    use ApiResponse;

    // Inyección de servicios

    public function __construct(
        private readonly PartidoService $partidoService,
        private readonly PrediccionService $prediccionService
    ) {}

    // Respuestas API

    public function getPredicciones(Request $request, string $get_jornada)
    {
        // Validar que la jornada exista

        $id_jornada = (int)$get_jornada;

        if ( empty($id_jornada) ) {

            return $this->errorResponse('No se encontró la jornada', 422);

        }

        // Validar que la jornada exista

        $jornada = $this->partidoService->getJornada($id_jornada);

        if ( empty($jornada) ) {

            return $this->errorResponse('No se encontró la jornada', 422);

        }

        // Actualizar información general

        $user_id = $request->user()->id;

        $this->actualizacionDataGeneral($user_id);

        // Obtener los partidos de jornada

        $predicciones = $this->prediccionService->getPrediccionesJornada($id_jornada, $user_id);

        $predicciones = PrediccionResource::collection($predicciones);

        return $this->successResponse($predicciones);

    }

    public function savePredicciones(PrediccionRequest $request)
    {
        // Actualizar información general

        $user_id = $request->user()->id;

        $this->actualizacionDataGeneral($user_id);

        // Validar predicciones

        $predicciones_nuevas = collect($request->predicciones);

        $id_partidos = $predicciones_nuevas->map(function($prediccion) {
            return $prediccion['id_partido'];
        })->toArray();

        // Obtener los partidos disponibles a predecir

        $predicciones_usuario = $this->prediccionService->getPrediccionesById($id_partidos, $user_id);

        $validacion_predicciones = $this->prediccionService->validatePrediccionesUsuario($predicciones_nuevas, $predicciones_usuario);

        $predicciones_rechazadas = PrediccionSolicitudResource::collection($validacion_predicciones['rechazadas']);

        $predicciones_permitidas = $validacion_predicciones['permitidas'];

        if ( $predicciones_permitidas->isEmpty() ) {

            return $this->successResponse([
                'prediccionesRechazadas' => $predicciones_rechazadas,
                'prediccionesProcesadas' => []
            ]);

        }

        $predicciones_guardadas = $this->prediccionService->savePredicciones($predicciones_nuevas, $predicciones_permitidas, $user_id);

        $predicciones_guardadas = PrediccionSolicitudResource::collection($predicciones_guardadas);

        return $this->successResponse([
            'prediccionesRechazadas' => $predicciones_rechazadas,
            'prediccionesProcesadas' => $predicciones_guardadas
        ]);

    }

    public function getResultados(Request $request, string $get_jornada)
    {
        // Validar que la jornada exista

        $id_jornada = (int)$get_jornada;

        if ( empty($id_jornada) ) {

            return $this->errorResponse('No se encontró la jornada', 422);

        }

        // Validar que la jornada exista

        $jornada = $this->partidoService->getJornada($id_jornada);

        if ( empty($jornada) ) {

            return $this->errorResponse('No se encontró la jornada', 422);

        }

        // Actualizar información general

        $user_id = $request->user()->id;

        $this->actualizacionDataGeneral($user_id);

        // Obtener los partidos de jornada

        $resultados = $this->prediccionService->getResultados($id_jornada, $user_id);

         $resultados = ResultadoResource::collection($resultados);

        return $this->successResponse($resultados);

    }

    public function actualizacionDataGeneral(int $user_id)
    {

        // Actualizar los estados de los partidos cuya hora ya pasó

        $this->partidoService->actualizarPartidosPasados();
        
        // Actualizar los puntos de los equipos cuyo estado partido no es 1 (Actualizado)

        $this->partidoService->actualizarPuntosEquipos();

        // Actualizar puntos de usuario

        $this->prediccionService->actualizarPuntosParticipantes($user_id);

    }

    // Continua lógica de la web

    public function verTablaResultados() 
    {

        $user_id = Auth::user()->id;

        $this->partidoService->actualizarPuntosEquipos();

        $this->prediccionService->actualizarPuntosParticipantes($user_id);

        return view('modulos.tabla-resultados');

    }

    public function verQuiniela($jornada = null, $message = '0OK')
    {
        $jornada = (int)$jornada;

        // Actualizar información general

        $user_id = Auth::user()->id;

        $this->actualizacionDataGeneral($user_id);

        // Obtenemos la información de la jornada a obtener

        $jornadas = $this->partidoService->getJornadas();

        $jornada_activa = $jornadas->firstWhere(function($jornada) {
            return $jornada->is_current === true;
        });

        $jornada_filtrada = empty($jornada) ? $jornada_activa->id : $jornada;

        // Obtener información de las predicciones realizadas por el usuario
        
        $partidosJornada = $this->prediccionService->prediccionesParticipante($jornada_filtrada, $user_id);

        return view('modulos.quiniela', [
            'jornadas' => $jornadas,
            'partidosJornada' => $partidosJornada, 
            'jornada_activa' => $jornada_filtrada,
            'message' => $message ?? '', 
        ]);

    }
    
    public function guardarPrediccionesForm(Request $request)
    {
        try {
            $count_error = 0;
            $message = "";
            $fecha_actual = new DateTime('now');

            foreach ($request->partidos as $partido_id) {
                $fecha_db = DB::select("select fecha_partido,estado FROM partidos WHERE id=" . $partido_id);
                $fecha_partido = new DateTime($fecha_db[0]->fecha_partido);
                $diff = $fecha_actual->diff($fecha_partido);
                $diferencia_minutos = (($diff->days * 1440 + $diff->h * 60) + $diff->i);
                
                if($diff->format('%R') == "+"){
                    if ($diferencia_minutos < 5) {
                        $count_error++;
                    } else {
                        DB::table('preccions')->updateOrInsert(
                            [
                                'user_id' => Auth::user()->id,
                                'partido_id' => $partido_id
                            ],
                            [
                                'goles_equipo_1' => $request['prediccion_equipo1_' . $partido_id],
                                'goles_equipo_2' => $request['prediccion_equipo2_' . $partido_id]
                            ]
                        );
                    }
                }else{
                    $count_error++;
                }
            }

            if ($count_error == 0) {
                $message = "1OK";
            } else {
                $message = "2OK";
            }
        } catch (\Throwable $th) {
            $message = $th;
        }

        return redirect("ver-quiniela/$request->jornada/$message");
    }

    // Lógica de API

    public function guardarPredicciones(Request $request)
    {
        try {
            $count_error=0;
            $message = "";
            $fecha_actual = new DateTime('now');

            foreach ($request->partidos as $partido) {
                $fecha_db = DB::select("select fecha_partido FROM partidos WHERE id=" . $partido['partido_id']);
                $fecha_partido = new DateTime($fecha_db[0]->fecha_partido);
                $diff = $fecha_actual->diff($fecha_partido);
                $diferencia_minutos = (($diff->days * 1440 + $diff->h * 60) + $diff->i);

                if ( $diferencia_minutos < 15) {
                    $count_error++;
                } else {
                    DB::table('preccions')->where('status', "=", 0)
                        ->updateOrInsert(
                            [
                                'user_id' => $request->user_id,
                                'partido_id' => $partido['partido_id']
                            ],
                            [
                                'goles_equipo_1' => $partido['marcador_equipo_1'],
                                'goles_equipo_2' => $partido['marcador_equipo_2']
                            ]
                        );
                }
            }

            if($count_error == 0){
                $message = "1OK";
            }else{
                $message = "2OK";
            }
        } catch (\Throwable $th) {
            $message = $th;
        }

        return json_encode($message);
    }

    public function obtenerPrediccionesGuardadas(Request $request)
    {

        $prediccionesPartidos = DB::select(
            "SELECT 
                p.goles_equipo_1,
                p.goles_equipo_2,
                p.partido_id,
                par.jornada,
                par.estado
            FROM 
                preccions p
            INNER JOIN 
                partidos par on p.partido_id = par.id 
            WHERE 
                par.jornada = $request->jornada 
            AND 
                p.user_id = $request->user_id"
        );

        return $prediccionesPartidos;

    }

    public function obtenerParticipantes($user_id)
    {

        $pais = DB::select(
            "SELECT 
                pais_id 
            FROM 
                users 
            WHERE id = {$user_id}"
        );

        $id_pais = $pais[0]->pais_id;
        
        $participantes = DB::select(
            "SELECT 
                u.id,
                u.name,
                u.nombres,
                u.apellidos,
                u.puntos,
                u.email,
                u.telefono,
                u.numero_documento,
                c.estado
            FROM 
                users u
            INNER JOIN 
                codigos c on u.codigo_id = c.id 
            WHERE 
                c.estado != 0 
            AND 
                u.pais_id = {$id_pais} 
            ORDER BY 
                u.puntos DESC"
        );
        
        return json_encode($participantes);
    }
    
    public function actualizarPuntosParticipantesALL()
    {
        
        $users = DB::select(
            "SELECT 
                id 
            FROM 
                users"
        );
        
        foreach ($users as $user) {
            $this->prediccionService->actualizarPuntosParticipantes($user->id);
        }

        return "10OK";
    }
        
}
