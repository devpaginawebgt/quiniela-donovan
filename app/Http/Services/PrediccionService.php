<?php

namespace App\Http\Services;

use App\Http\Resources\Partido\PartidoResource;
use App\Models\Equipo;
use App\Models\Preccion;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

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
                par.jornada,
                par.estado,
                par.fecha_partido,
                ep.equipo_1,
                ep.equipo_2
            FROM 
                partidos par
            INNER JOIN 
                equipo_partidos ep ON par.id = ep.partido_id
            WHERE 
                par.jornada = $jornada 
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

    public function getPredicciones(Collection $equipos_partidos, int $user_id)
    {

        $predicciones = collect([]);

        $equipos_partidos->each(function($equipos_partido) use($predicciones, $user_id) {

            $id_partido = $equipos_partido->partido->id;

            // Buscamos si el usuario ya hizo una predicción

            $prediccion = Preccion::select('id', 'partido_id', 'goles_equipo_1', 'goles_equipo_2')
                ->where('partido_id', $id_partido)
                ->where('user_id', $user_id)
                ->first();

            if ( empty($prediccion) ) {

                // Si no existe la predicción colocamos valores por defecto

                $equipos_partido->prediccion_equipo_1 = 0;

                $equipos_partido->prediccion_equipo_2 = 0;

                $predicciones->push($equipos_partido);

                return;

            }

            $equipos_partido->prediccion_equipo_1 = $prediccion->goles_equipo_1;

            $equipos_partido->prediccion_equipo_2 = $prediccion->goles_equipo_2;

            $predicciones->push($equipos_partido);

        });

        return $predicciones;

    }

    public function savePredicciones(array $predicciones, int $user_id)
    {

        $predicciones = collect($predicciones);

        $id_partidos = collect([]);

        $predicciones->each(function($prediccion) use($user_id, $id_partidos) {

            $prediccion_db = Preccion::select('id', 'partido_id', 'goles_equipo_1', 'goles_equipo_2')
                ->where('partido_id', $prediccion['id_partido'])
                ->where('user_id', $user_id)
                ->first();

            // dd($prediccion, $prediccion_db);

            if ( empty($prediccion_db) ) {

                // Si no existe la predicción, la creamos

                $prediccion_creada = Preccion::create([
                    'user_id' => $user_id,
                    'partido_id' => $prediccion['id_partido'],
                    'goles_equipo_1' => $prediccion['prediccion_equipo_uno'],
                    'goles_equipo_2' => $prediccion['prediccion_equipo_dos'],
                ]);

                $id_partidos->push($prediccion['id_partido']);
                
                return;

            }

            $prediccion_db->goles_equipo_1 = $prediccion['prediccion_equipo_uno'];
            $prediccion_db->goles_equipo_2 = $prediccion['prediccion_equipo_dos'];

            if ($prediccion_db->isDirty()) $prediccion_db->save();

            $id_partidos->push($prediccion['id_partido']);

        });

        return $id_partidos;

    }
}