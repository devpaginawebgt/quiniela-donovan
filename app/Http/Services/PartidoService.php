<?php

namespace App\Http\Services;

use App\Http\Resources\Partido\PartidoResource;
use App\Models\Equipo;
use App\Models\EquipoPartido;
use App\Models\Partido;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PartidoService {

    public function getJornadas()
    {
        return collect([
            ['value' => 1, 'name' => '1'],
            ['value' => 2, 'name' => '2'],
            ['value' => 3, 'name' => '3'],
            ['value' => 4, 'name' => 'Octavos de final'],
            ['value' => 5, 'name' => 'Cuartos de final'],
            ['value' => 6, 'name' => 'Semifinales'],
            ['value' => 7, 'name' => 'Partido por tercer lugar'],
            ['value' => 8, 'name' => 'Final'],
        ]);
    }

    public function getJornada(int $jornada)
    {

        $jornadas = $this->getJornadas();

        return $jornadas->firstWhere('value', $jornada);

    }

    public function getPartidosJornada(int $jornada)
    {

        $partidos = EquipoPartido::select('id', 'equipo_1', 'equipo_2', 'partido_id')
            ->has('equipoUno')
            ->has('equipoDos')
            ->whereHas('partido', function(Builder $query) use($jornada) {
                $query->where('jornada', $jornada);
            })
            ->with([
                'partido:id,fase,jornada,fecha_partido,jugado,estado',
                'equipoUno:id,nombre,imagen,grupo',
                'equipoDos:id,nombre,imagen,grupo'
            ])
            ->get();

        return $partidos;

    }

    public function getPartidosJornadaPendientes(int $jornada)
    {

        $partidos = EquipoPartido::select('id', 'equipo_1', 'equipo_2', 'partido_id')
            ->has('equipoUno')
            ->has('equipoDos')
            ->whereHas('partido', function(Builder $query) use($jornada) {
                $query
                    ->where('jornada', $jornada)
                    ->whereNot('estado', 1);
            })
            ->with([
                'partido:id,fase,jornada,fecha_partido,jugado,estado',
                'equipoUno:id,nombre,imagen,grupo',
                'equipoDos:id,nombre,imagen,grupo'
            ])
            ->get();

        return $partidos;

    }

    public function getPartidosPredicciones(array $partido_ids)
    {
        $equipos_partidos = EquipoPartido::select('id', 'equipo_1', 'equipo_2', 'partido_id')
            ->has('equipoUno')
            ->has('equipoDos')
            ->whereHas('partido', function(Builder $query) use($partido_ids) {
                $query->whereIn('id', $partido_ids);
            })
            ->with([
                'partido:id,fase,jornada,fecha_partido,jugado,estado',
                'equipoUno:id,nombre,imagen,grupo',
                'equipoDos:id,nombre,imagen,grupo'
            ])
            ->get();

        $error = false;
        
        $message = '';

        $equipos_partidos_validos = collect([]);

        $equipos_partidos->each(function($equipos_partido) use( &$error, &$message, &$equipos_partidos_validos ) {

            $estado = $equipos_partido->partido->estado;

            if ($estado === 1) {

                $error = true;

                $message = 'No se puede guardar la predicción: el partido ha finalizado.';

                return;

            }

            if ($estado === 2) {

                $error = true;

                $message = 'No se puede guardar la predicción: ¡el partido está en juego!';

                return;

            }

            $fecha_partido = Carbon::parse($equipos_partido->partido->fecha_partido);

            $fecha_actual = Carbon::now();

            if ($fecha_actual->greaterThan($fecha_partido)) {

                $error = true;

                $message = 'No se puede guardar la predicción: la fecha del partido ya ha pasado.';

                return;

            }

            $fecha_limite = $fecha_partido->subMinutes(10);

            if ($fecha_actual->greaterThan($fecha_limite)) {

                $error = true;

                $message = 'No se puede guardar la predicción: el partido está por comenzar (menos de 10 minutos).';

                return;

            }

            $equipos_partidos_validos->push($equipos_partido);

        });

        return [
            'error' => $error,
            'message' => $message,
            'equipos_partidos' => $equipos_partidos
        ];

    }

    public function getPartidosById(Collection $partido_ids)
    {
        
        $partido_ids = $partido_ids->toArray();

        $partidos = EquipoPartido::select('id', 'equipo_1', 'equipo_2', 'partido_id')
            ->has('equipoUno')
            ->has('equipoDos')
            ->whereHas('partido', function(Builder $query) use($partido_ids) {
                $query
                    ->whereIn('id', $partido_ids)
                    ->whereNot('estado', 1);
            })
            ->with([
                'partido:id,fase,jornada,fecha_partido,jugado,estado',
                'equipoUno:id,nombre,imagen,grupo',
                'equipoDos:id,nombre,imagen,grupo'
            ])
            ->get();

        return $partidos;

    }

    public function getJornadasGrupo(string $grupo)
    {
        $jornadas = collect([1, 2, 3]);
        
        $partidosJornadas = collect([]);

        $jornadas->each(function($jornada) use($grupo, $partidosJornadas) {

            $jornada_ob = $this->getJornada($jornada);

            $partidosJornada = EquipoPartido::select('id', 'equipo_1', 'equipo_2', 'partido_id')
                ->whereHas('partido', function(Builder $query) use($jornada) {
                    $query->where('jornada', $jornada);
                })
                ->whereHas('equipoUno', function(Builder $query) use($grupo) {
                    $query->where('grupo', $grupo);
                })
                ->whereHas('equipoDos', function(Builder $query) use($grupo) {
                    $query->where('grupo', $grupo);
                })
                ->with([
                    'partido:id,fase,jornada,fecha_partido,jugado,estado',
                    'equipoUno:id,nombre,imagen,grupo',
                    'equipoDos:id,nombre,imagen,grupo'
                ])
                ->get();

            $partidosJornada = PartidoResource::collection($partidosJornada);

            $jornada_ob['partidos'] = $partidosJornada;

            $partidosJornadas->push($jornada_ob);

        });

        return $partidosJornadas;
    }

    public function getPartidosFinalizados(int $jornada)
    {

        $partidos = EquipoPartido::select('id', 'equipo_1', 'equipo_2', 'partido_id')
            ->has('equipoUno')
            ->has('equipoDos')
            ->has('resultado')
            ->whereHas('partido', function(Builder $query) use($jornada) {
                $query
                    ->where('jornada', $jornada)
                    ->where('estado', 1);
            })
            ->with([
                'partido:id,fase,jornada,fecha_partido,jugado,estado',
                'equipoUno:id,nombre,imagen,grupo',
                'equipoDos:id,nombre,imagen,grupo',
                'resultado:id,partido_id,goles_equipo_1,goles_equipo_2'
            ])
            ->get();

        return $partidos;

    }

    // Actualizar el estado de los partidos, si la hora ya ha pasado

    public function actualizarPartidosPasados()
    {

        return Partido::select('id', 'fecha_partido', 'estado')
            ->whereDate('fecha_partido', Carbon::today())
            ->where('fecha_partido', '<', Carbon::now())
            ->where('estado', 0)
            ->update(['estado' => 2]);

    }

    // Actualizar los puntos de los equipos cuyo estado de partido no sea 1 (puntos actualizados)

    public function actualizarPuntosEquipos()
    {

        // $partidosJugados = EquipoPartido::select('id', 'equipo_1', 'equipo_2', 'partido_id')
        //     ->with([
        //         'partido:id,estado',
        //         'equipoUno:id,nombre',
        //         'equipoDos:id,nombre',
        //         'resultado:id,partido_id,goles_equipo_1,goles_equipo_2',
        //     ])
        //     ->has('equipoUno')
        //     ->has('equipoDos')
        //     ->has('resultado')
        //     ->whereHas('partido', function(Builder $query) {
        //         $query->whereNot('estado', 1);
        //     })
        //     ->get();

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

        // foreach ($partidosJugados as $partido) {

        //     $equipo1 = $partido->equipoUno;
        //     $equipo2 = $partido->equipoDos;

        //     $goles_e1 = $partido->resultado->goles_equipo_1;
        //     $goles_e2 = $partido->resultado->goles_equipo_2;

        //     // Actualizar valores

        //     $equipo1->goles_favor += $goles_e1;
        //     $equipo1->goles_contra += $goles_e2;

        // }

        // return;

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
            $partidoJugado->jugado = 1;
            $partidoJugado->save();
        }
    }

}