<?php

namespace App\Http\Services;

use App\Models\Equipo;
use App\Models\Partido;
use DateTime;
use Illuminate\Support\Facades\DB;

class PartidoService {

    // Actualizar el estado de los partidos, si la hora ya ha pasado

    public function actualizarEstadoPartidos()
    {

        $fecha_hoy = date('Y-m-d');

        $partidos = DB::select(
            "SELECT 
                id,
                fecha_partido 
            FROM 
                partidos 
            WHERE 
                fecha_partido LIKE '%$fecha_hoy%' 
            AND 
                estado = 0"
        );

        $fecha_actual = new DateTime('now');

        foreach ($partidos as $partido) {

            $fecha_partido = new DateTime($partido->fecha_partido);

            $diff = $fecha_actual->diff($fecha_partido);            

            if ($diff->format('%R') == "-") {

                $partidoJugado = Partido::find($partido->id);

                $partidoJugado->estado = 2;

                $partidoJugado->save();

            }

        }
    }

    // Actualizar los puntos de los equipos cuyo estado de partido no sea 1 (puntos actualizados)

    public function actualizarPuntosEquipos()
    {

        $resultados = DB::select(
            "SELECT 
                res.goles_equipo_1,
                res.goles_equipo_2,
                res.partido_id,
                epar.equipo_1,
                epar.equipo_2
            FROM 
                partidos par
            INNER JOIN 
                equipo_partidos epar ON epar.partido_id = par.id
            INNER JOIN 
                resultado_partidos res ON res.partido_id = par.id 
            WHERE 
                par.estado != 1"
        );

        foreach ($resultados as $resultado) {

            if ($resultado->goles_equipo_1 > $resultado->goles_equipo_2) {

                $equipoGanador = Equipo::find($resultado->equipo_1);
                $equipoGanador->goles_favor += $resultado->goles_equipo_1;
                $equipoGanador->goles_contra += $resultado->goles_equipo_2;
                $equipoGanador->partidos_jugados += 1;
                $equipoGanador->partidos_ganados += 1;
                $equipoGanador->puntos += 3;
                $equipoGanador->save();

                $equipoPerdedor = Equipo::find($resultado->equipo_2);
                $equipoPerdedor->goles_favor += $resultado->goles_equipo_2;
                $equipoPerdedor->goles_contra += $resultado->goles_equipo_1;
                $equipoPerdedor->partidos_jugados += 1;
                $equipoPerdedor->partidos_perdidos += 1;
                $equipoPerdedor->save();

            } elseif ($resultado->goles_equipo_1 < $resultado->goles_equipo_2) {

                $equipoGanador = Equipo::find($resultado->equipo_2);
                $equipoGanador->goles_favor += $resultado->goles_equipo_2;
                $equipoGanador->goles_contra += $resultado->goles_equipo_1;
                $equipoGanador->partidos_jugados += 1;
                $equipoGanador->partidos_ganados += 1;
                $equipoGanador->puntos += 3;
                $equipoGanador->save();

                $equipoPerdedor = Equipo::find($resultado->equipo_1);
                $equipoPerdedor->goles_favor += $resultado->goles_equipo_1;
                $equipoPerdedor->goles_contra += $resultado->goles_equipo_2;
                $equipoPerdedor->partidos_jugados += 1;
                $equipoPerdedor->partidos_perdidos += 1;
                $equipoPerdedor->save();

            } else {

                $equipoEmpate1 = Equipo::find($resultado->equipo_1);
                $equipoEmpate1->goles_favor += $resultado->goles_equipo_1;
                $equipoEmpate1->goles_contra += $resultado->goles_equipo_2;
                $equipoEmpate1->partidos_jugados += 1;
                $equipoEmpate1->partidos_empatados += 1;
                $equipoEmpate1->puntos += 1;
                $equipoEmpate1->save();

                $equipoEmpate2 = Equipo::find($resultado->equipo_2);
                $equipoEmpate2->goles_favor += $resultado->goles_equipo_2;
                $equipoEmpate2->goles_contra += $resultado->goles_equipo_1;
                $equipoEmpate2->partidos_jugados += 1;
                $equipoEmpate2->partidos_empatados += 1;
                $equipoEmpate2->puntos += 1;
                $equipoEmpate2->save();

            }

            $partidoJugado = Partido::find($resultado->partido_id);
            $partidoJugado->estado = 1;
            $partidoJugado->save();
        }
    }

}