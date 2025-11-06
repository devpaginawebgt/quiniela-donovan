<?php

namespace App\Http\Services;

use App\Models\Equipo;
use App\Models\Preccion;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
}