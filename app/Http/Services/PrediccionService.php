<?php

namespace App\Http\Services;

use App\Http\Resources\Partido\PartidoResource;
use App\Models\Equipo;
use App\Models\EquipoPartido;
use App\Models\Preccion;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\JoinClause;

class PrediccionService {

    public function actualizarPuntosParticipantes($user_id)
    {

        $predicciones_resultados = DB::select(
            "SELECT 
                pre.id,
                pre.goles_equipo_1 as p_equipo_1, 
                pre.goles_equipo_2 as p_equipo_2, 
                pre.partido_id,
                res.goles_equipo_1,
                res.goles_equipo_2
            FROM 
                preccions pre
            INNER JOIN 
                resultado_partidos res on pre.partido_id = res.partido_id
            WHERE 
                user_id = $user_id 
            AND 
                status = 0"
        );

        foreach ($predicciones_resultados as $prediccion) {

            $usuario = User::find($user_id);

            if ($prediccion->p_equipo_1 == $prediccion->goles_equipo_1 && $prediccion->p_equipo_2 == $prediccion->goles_equipo_2) {

                $usuario->puntos += 5;
                
            } elseif (($prediccion->p_equipo_1 > $prediccion->p_equipo_2 && $prediccion->goles_equipo_1 > $prediccion->goles_equipo_2) &&
                ($prediccion->p_equipo_1 == $prediccion->goles_equipo_1 || $prediccion->p_equipo_2 == $prediccion->goles_equipo_2)
            ) {

                $usuario->puntos += 4;
                
            } elseif (($prediccion->p_equipo_2 > $prediccion->p_equipo_1 && $prediccion->goles_equipo_2 > $prediccion->goles_equipo_1) &&
                ($prediccion->p_equipo_1 == $prediccion->goles_equipo_1 || $prediccion->p_equipo_2 == $prediccion->goles_equipo_2)
            ) {

                $usuario->puntos += 4;
                
            } elseif (($prediccion->p_equipo_1 > $prediccion->p_equipo_2 && $prediccion->goles_equipo_1 > $prediccion->goles_equipo_2) ||
                ($prediccion->p_equipo_2 > $prediccion->p_equipo_1 && $prediccion->goles_equipo_2 > $prediccion->goles_equipo_1)
            ) {

                $usuario->puntos += 2;
                
            } elseif ($prediccion->p_equipo_2 == $prediccion->p_equipo_1 && $prediccion->goles_equipo_2 == $prediccion->goles_equipo_1) {

                $usuario->puntos += 2;
                
            } elseif ($prediccion->p_equipo_1 == $prediccion->goles_equipo_1 || $prediccion->p_equipo_2 == $prediccion->goles_equipo_2) {

                $usuario->puntos += 1;
                
            } else {
                $usuario->puntos += 0;
                
            }
            $usuario->save();

            $prediccion_guardada = Preccion::find($prediccion->id);
            $prediccion_guardada->status = 1;
            $prediccion_guardada->save();
        }
    }

    public function prediccionesParticipante($jornada, $user_id)
    {
    
        $partidosJornada = DB::select(
            "SELECT 
                par.id as partido_id,
                par.jornada_id,
                par.estado,
                par.fecha_partido,
                ep.equipo_1,
                ep.equipo_2
            FROM 
                partidos par
            INNER JOIN 
                equipo_partidos ep ON par.id = ep.partido_id
            WHERE 
                par.jornada_id = $jornada 
            ORDER BY 
                par.fecha_partido ASC"
        );


        foreach ($partidosJornada as $partido) {

            $equipo_1 = Equipo::find($partido->equipo_1);

            $equipo_2 = Equipo::find($partido->equipo_2);

            $prediccions = DB::select(
                "SELECT 
                    preccions.goles_equipo_1,
                    preccions.goles_equipo_2 
                FROM 
                    preccions
                WHERE 
                    partido_id = $partido->partido_id 
                AND 
                    user_id = $user_id"
            );

            $partido->pdg_equipo_1 = $prediccions[0]->goles_equipo_1 ?? 0;
            $partido->pdg_equipo_2 = $prediccions[0]->goles_equipo_2 ?? 0;

            $partido->nombre_equipo_1 = $equipo_1->nombre;
            $partido->imagen_equipo_1 = $equipo_1->imagen;

            $partido->nombre_equipo_2 = $equipo_2->nombre;
            $partido->imagen_equipo_2 = $equipo_2->imagen;
            
            $partido->fecha_partido = Carbon::create($partido->fecha_partido)
                ->locale('es')
                ->isoFormat('dddd D \d\e MMMM \d\e\l Y,  h:mm:ss A');

            $prediccion = DB::select(
                "SELECT 
                    pre.id,
                    pre.goles_equipo_1 as p_equipo_1, 
                    pre.goles_equipo_2 as p_equipo_2, 
                    pre.partido_id,
                    res.goles_equipo_1,
                    res.goles_equipo_2
                FROM 
                    preccions pre
                INNER JOIN 
                    resultado_partidos res ON pre.partido_id = res.partido_id
                WHERE 
                    pre.user_id = {$user_id} 
                AND 
                    pre.partido_id = {$partido->partido_id}"
            );

            $partido->goles_equipo_1 = $prediccion[0]->goles_equipo_1 ?? '';
            
            $partido->goles_equipo_2 = $prediccion[0]->goles_equipo_2 ?? '';

            if ($partido->estado == 1 && isset($prediccion[0])) {
                if ($prediccion[0]->p_equipo_1 == $prediccion[0]->goles_equipo_1 && $prediccion[0]->p_equipo_2 == $prediccion[0]->goles_equipo_2) {

                    $partido->puntos = 5;

                } elseif (($prediccion[0]->p_equipo_1 > $prediccion[0]->p_equipo_2 && $prediccion[0]->goles_equipo_1 > $prediccion[0]->goles_equipo_2) &&

                    ($prediccion[0]->p_equipo_1 == $prediccion[0]->goles_equipo_1 || $prediccion[0]->p_equipo_2 == $prediccion[0]->goles_equipo_2)

                ) {

                    $partido->puntos = 4;

                } elseif (($prediccion[0]->p_equipo_2 > $prediccion[0]->p_equipo_1 && $prediccion[0]->goles_equipo_2 > $prediccion[0]->goles_equipo_1) &&
                    ($prediccion[0]->p_equipo_1 == $prediccion[0]->goles_equipo_1 || $prediccion[0]->p_equipo_2 == $prediccion[0]->goles_equipo_2)
                ) {

                    $partido->puntos = 4;

                } elseif (($prediccion[0]->p_equipo_1 > $prediccion[0]->p_equipo_2 && $prediccion[0]->goles_equipo_1 > $prediccion[0]->goles_equipo_2) ||
                    ($prediccion[0]->p_equipo_2 > $prediccion[0]->p_equipo_1 && $prediccion[0]->goles_equipo_2 > $prediccion[0]->goles_equipo_1)
                ) {

                    $partido->puntos = 2;

                } elseif ($prediccion[0]->p_equipo_2 == $prediccion[0]->p_equipo_1 && $prediccion[0]->goles_equipo_2 == $prediccion[0]->goles_equipo_1) {

                    $partido->puntos = 2;

                } elseif ($prediccion[0]->p_equipo_1 == $prediccion[0]->goles_equipo_1 || $prediccion[0]->p_equipo_2 == $prediccion[0]->goles_equipo_2) {

                    $partido->puntos = 1;
                } else {
                    $partido->puntos = 0;
                }
            }
        }

        return $partidosJornada;
    }

    public function getPrediccionesJornada(int $id_jornada, int $user_id)
    {
        $predicciones_usuario = EquipoPartido::select([
            'equipo_partidos.id', 
            'equipo_partidos.equipo_1', 
            'equipo_partidos.equipo_2', 
            'equipo_partidos.partido_id',
            'preccions.id AS preccion_id',
            'preccions.goles_equipo_1 AS prediccion_equipo_1',
            'preccions.goles_equipo_2 AS prediccion_equipo_2',
        ])
            ->has('equipoUno')
            ->has('equipoDos')
            ->whereHas('partido', function(Builder $query) use($id_jornada) {
                $query
                    ->where('jornada_id', $id_jornada)
                    ->whereNot('estado', 1);
            })
            ->with([
                'partido:id,fase,jornada_id,fecha_partido,jugado,estado',
                'equipoUno:id,nombre,imagen,grupo',
                'equipoDos:id,nombre,imagen,grupo'
            ])
            ->leftJoin('preccions', function (JoinClause $join) use($user_id) {
                $join->on('equipo_partidos.id', '=', 'preccions.partido_id')
                    ->where('preccions.user_id', $user_id);
            })
            ->get();

        return $predicciones_usuario;

    }

    public function getPrediccionesById(array $id_partidos, int $user_id)
    {
        $predicciones_usuario = EquipoPartido::select([
            'equipo_partidos.id', 
            'equipo_partidos.equipo_1', 
            'equipo_partidos.equipo_2', 
            'equipo_partidos.partido_id',
            'preccions.id AS preccion_id',
            'preccions.goles_equipo_1 AS prediccion_equipo_1',
            'preccions.goles_equipo_2 AS prediccion_equipo_2',
        ])
            ->has('equipoUno')
            ->has('equipoDos')
            ->whereHas('partido', function(Builder $query) use($id_partidos) {
                $query->whereIn('id', $id_partidos);
            })
            ->with([
                'partido:id,fase,jornada_id,fecha_partido,jugado,estado',
                'equipoUno:id,nombre,imagen,grupo',
                'equipoDos:id,nombre,imagen,grupo'
            ])
            ->leftJoin('preccions', function (JoinClause $join) use($user_id) {
                $join->on('equipo_partidos.id', '=', 'preccions.partido_id')
                    ->where('preccions.user_id', $user_id);
            })
            ->get();

        return $predicciones_usuario;

    }

    public function validatePrediccionesUsuario($predicciones_nuevas, $predicciones_usuario) {

        // Iteramos para hacer verificación de partidos y separamos errores

        $predicciones_rechazadas = collect([]);

        $predicciones_permitidas = collect([]);

        $predicciones_nuevas->each(function($prediccion_nueva) use( $predicciones_usuario, &$predicciones_rechazadas, &$predicciones_permitidas ) {

            $prediccion_usuario = $predicciones_usuario->firstWhere('partido_id', $prediccion_nueva['id_partido']);

            if ($prediccion_nueva['prediccion_equipo_uno'] === null) {

                $prediccion_usuario->message = 'No se puede guardar la predicción: la predicción de marcador del primer equipo está vacía.';

                $predicciones_rechazadas->push($prediccion_usuario);

                return;

            }

            if ($prediccion_nueva['prediccion_equipo_dos'] === null) {

                $prediccion_usuario->message = 'No se puede guardar la predicción: la predicción de marcador del segundo equipo está vacía.';

                $predicciones_rechazadas->push($prediccion_usuario);

                return;

            }

            $estado = $prediccion_usuario->partido->estado;

            if ($estado === 1) {

                $prediccion_usuario->message = 'No se puede guardar la predicción: el partido ha finalizado.';

                $predicciones_rechazadas->push($prediccion_usuario);

                return;

            }

            if ($estado === 2) {

                $prediccion_usuario->message = 'No se puede guardar la predicción: ¡el partido está en juego!';

                $predicciones_rechazadas->push($prediccion_usuario);

                return;

            }

            $fecha_partido = Carbon::parse($prediccion_usuario->partido->fecha_partido);

            $fecha_actual = Carbon::now();

            if ($fecha_actual->greaterThan($fecha_partido)) {

                $prediccion_usuario->message = 'No se puede guardar la predicción: la fecha del partido ya ha pasado.';

                $predicciones_rechazadas->push($prediccion_usuario);

                return;

            }

            $fecha_limite = $fecha_partido->subMinutes(10);

            if ($fecha_actual->greaterThan($fecha_limite)) {

                $prediccion_usuario->message = 'No se puede guardar la predicción: el partido está por comenzar (menos de 10 minutos).';

                $predicciones_rechazadas->push($prediccion_usuario);

                return;

            }

            $predicciones_permitidas->push($prediccion_usuario);

        });

        return [
            'rechazadas' => $predicciones_rechazadas,
            'permitidas' => $predicciones_permitidas
        ];

    }

    public function savePredicciones($predicciones_nuevas, $predicciones_usuario, $user_id)
    {
        $predicciones_nuevas->each(function($prediccion_nueva) use(&$predicciones_usuario, $user_id) {

            $prediccion_usuario = $predicciones_usuario->firstWhere('partido_id', $prediccion_nueva['id_partido']);

            // Si no existe la predicción, la creamos

            if ( empty($prediccion_usuario->preccion_id) ) {

                $prediccion_creada = Preccion::create([
                    'user_id' => $user_id,
                    'partido_id' => $prediccion_nueva['id_partido'],
                    'goles_equipo_1' => $prediccion_nueva['prediccion_equipo_uno'],
                    'goles_equipo_2' => $prediccion_nueva['prediccion_equipo_dos'],
                ]);

                // Actualizamos la predicción del usuario

                $prediccion_usuario->preccion_id = $prediccion_creada->id;
                $prediccion_usuario->prediccion_equipo_1 = $prediccion_creada->goles_equipo_1;
                $prediccion_usuario->prediccion_equipo_2 = $prediccion_creada->goles_equipo_2;
                $prediccion_usuario->message = 'Tu pronóstico ha sido guardado con éxito.';

                return;

            }

            // Si ya existe una prediccion de este usuario, buscamos el regisro

            $prediccion_db = Preccion::find($prediccion_usuario->preccion_id);
            $prediccion_db->goles_equipo_1 = $prediccion_nueva['prediccion_equipo_uno'];
            $prediccion_db->goles_equipo_2 = $prediccion_nueva['prediccion_equipo_dos'];

            // Actualizamos el registro en caso se haya modificado

            if ($prediccion_db->isDirty()) {

                $prediccion_db->save();
                $prediccion_usuario->prediccion_equipo_1 = $prediccion_db->goles_equipo_1;
                $prediccion_usuario->prediccion_equipo_2 = $prediccion_db->goles_equipo_2;
                $prediccion_usuario->message = 'Tu pronóstico ha sido actualizado con éxito.';

                return;

            }

            // Si los marcadores son los mismos no se toma acción

            $prediccion_usuario->message = 'Tu pronóstico ha mantenido el mismo marcador.';

            return;

        });

        return $predicciones_usuario;

    }

    public function getResultadoPrediccion($prediccion, $resultado)
    {

        $pred_e_uno = $prediccion->goles_equipo_1;
        $pred_e_dos = $prediccion->goles_equipo_2;

        $res_e_uno = $resultado->goles_equipo_1;
        $res_e_dos = $resultado->goles_equipo_2;

        // Acertó en goles

        $acerto_goles_uno = boolval($pred_e_uno === $res_e_uno);
        $acerto_goles_dos = boolval($pred_e_dos === $res_e_dos);

        $acerto_marcadores = boolval($acerto_goles_uno && $acerto_goles_dos);
        $acerto_un_marcador = boolval($acerto_goles_uno || $acerto_goles_dos);

        // Acertó en equipo ganador

        $acerto_ganador_uno = boolval($res_e_uno > $res_e_dos && $pred_e_uno > $pred_e_dos);
        $acerto_ganador_dos = boolval($res_e_dos > $res_e_uno && $pred_e_dos > $pred_e_uno);

        $acerto_equipo_ganador = boolval($acerto_ganador_uno || $acerto_ganador_dos);

        // Acertó empate

        $resultado_empate = boolval($res_e_uno === $res_e_dos);
        $prediccion_empate = boolval($pred_e_uno === $pred_e_dos);

        $predijo_empate = boolval($resultado_empate && $prediccion_empate);

        // Validaciones de predicción

        if ($acerto_marcadores) return 5;

        if ($acerto_equipo_ganador && $acerto_un_marcador) return 4; 

        if ($acerto_equipo_ganador) return 2;

        if ($predijo_empate) return 2;

        if ($acerto_un_marcador) return 1;

        return 0;
    
    }

    public function getResultados(Collection $equipos_partidos, int $user_id)
    {

        $resultados = collect([]);

        $equipos_partidos->each(function($equipos_partido) use($resultados, $user_id) {

            $id_partido = $equipos_partido->partido->id;

            // Buscamos si el usuario ya hizo una predicción

            $prediccion = Preccion::select('id', 'partido_id', 'goles_equipo_1', 'goles_equipo_2')
                ->where('partido_id', $id_partido)
                ->where('user_id', $user_id)
                ->first();

            if ( empty($prediccion) ) {

                // Si no existe la predicción colocamos valores por defecto

                $equipos_partido->prediccion_equipo_1 = null;

                $equipos_partido->prediccion_equipo_2 = null;

                $equipos_partido->puntos = 0;

                $equipos_partido->mensaje = 'No has realizado una predicción.';

                $resultados->push($equipos_partido);

                return;

            }

            $puntos = $this->getResultadoPrediccion($prediccion, $equipos_partido->resultado);

            $equipos_partido->prediccion_equipo_1 = $prediccion->goles_equipo_1;

            $equipos_partido->prediccion_equipo_2 = $prediccion->goles_equipo_2;

            $equipos_partido->puntos = $puntos;

            $equipos_partido->mensaje = "Ganaste: {$puntos} puntos";

            $resultados->push($equipos_partido);

        });

        return $resultados;

    }
}