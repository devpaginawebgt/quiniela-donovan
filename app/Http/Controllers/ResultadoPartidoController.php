<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PartidoService;
use App\Http\Services\PrediccionService;

class ResultadoPartidoController extends Controller
{
    // Inyección de servicios

    private $partidoService;
    private $prediccionService;

    public function __construct(
        PartidoService $partidoService,
        PrediccionService $prediccionService
    ) 
    {
        $this->partidoService = $partidoService;
        $this->prediccionService = $prediccionService;
    }

    // Respuestas del controlador

    public function verQuiniela($jornada = 1, $message = '0OK')
    {
        // Actualizar los estados de los partidos cuya hora ya pasó

        $this->partidoService->actualizarEstadoPartidos();

        // Actualizar los puntos de los equipos cuyo estado partido no es 1 (Actualizado)

        $this->partidoService->actualizarPuntosEquipos();

        // Actualizar los puntos del usuario

        $user_id = Auth::user()->id;

        $this->prediccionService->actualizarPuntosParticipantes($user_id);

        // Obtener información de las predicciones realizadas por el usuario
        
        $partidosJornada = $this->prediccionService->prediccionesParticipante($jornada, $user_id);

        return view('modulos.quiniela', [
            'partidosJornada' => $partidosJornada, 
            'message' => $message ?? '', 
            'jornada' => $jornada
        ]);

    }

    public function verTablaResultados() 
    {

        $user_id = Auth::user()->id;

        $this->partidoService->actualizarPuntosEquipos();

        $this->prediccionService->actualizarPuntosParticipantes($user_id);

        return view('modulos.tabla-resultados');

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

    public function testPerformance($user_id){

        return $user_id;

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
                users.id,
                users.name,
                nombres,
                apellidos,
                puntos,
                email,
                telefono,
                numero_documento,
                estado
            FROM 
                users 
            INNER JOIN 
                codigos on codigo_id=codigos.id 
            WHERE 
                estado != 0 
            AND 
                users.pais_id = {$id_pais} 
            ORDER BY 
                puntos DESC"
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
            $this->actualizarPuntosParticipantes($user->id);
        }

        return "10OK";
    }



    
}
