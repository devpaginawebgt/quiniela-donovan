<?php

namespace App\Http\Controllers;

use App\Http\Resources\Equipo\EquipoResource;
use App\Http\Services\EquipoService;
use App\Http\Services\GrupoService;
use App\Http\Services\PartidoService;
use App\Models\Equipo;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly PartidoService $partidoService,
        private readonly EquipoService $equipoService
    ) {}

    public function index()
    {

        $selecciones  = Equipo::all();

        return view('modulos.selecciones', [
            'selecciones' => $selecciones
        ]);

    }

    public function verCalendario() {

        return view('modulos.calendario');

    }

    public function verModuloGrupos()
    {

        $this->partidoService->actualizarPuntosEquipos();

        return view('modulos.grupos');

    }

    public function equiposGrupo($grupo_get)
    {

        $grupo = strtoupper($grupo_get);

        $equipos = Equipo::where('grupo',$grupo)
            ->orderBy('puntos','desc')
            ->orderBy('goles_favor','desc')
            ->orderBy('goles_contra','asc')
            ->get();

        return json_encode($equipos);

    }

    public function partidosGrupo(Request $grupoJornada)
    {

        $grupo = strtoupper($grupoJornada->grupo);

        $jornada = $grupoJornada->jornada;              

        $partidosGrupo = DB::select(
            "SELECT 
                * 
            FROM 
                equipo_partidos epar
            INNER JOIN 
                equipos e ON epar.equipo_1 = e.id OR epar.equipo_2 = e.id
            INNER JOIN 
                partidos par ON epar.partido_id = par.id
            WHERE 
                e.grupo = '{$grupo}'
            AND
                par.jornada = {$jornada}"
        );

        return json_encode($partidosGrupo);
        
    }

    public function partidosJornada($jornada)
    {

        $partidosJornada = DB::select(
            "SELECT 
                * 
            FROM 
                equipo_partidos epar
            INNER JOIN 
                equipos e ON epar.equipo_1 = e.id OR epar.equipo_2 = e.id
            INNER JOIN 
                partidos par ON epar.partido_id = par.id
            WHERE 
                par.jornada = {$jornada}"
        );

        return json_encode($partidosJornada);

    }

    // Respuestass de API

    public function getEquipos(Request $request)
    {
        $equipos = $this->equipoService->getEquipos();

        $equipos = EquipoResource::collection($equipos);

        return $this->successResponse($equipos);
    }
}
