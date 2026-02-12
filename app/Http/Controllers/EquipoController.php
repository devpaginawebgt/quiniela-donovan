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

    // Respuestas de API

    public function index(Request $request)
    {
        $equipos = $this->equipoService->getEquipos();

        $equipos = EquipoResource::collection($equipos);

        return $this->successResponse($equipos);
    }


    // Funciones para la web

    public function indexWeb()
    {

        $equipos = $this->equipoService->getEquipos();

        return view('modulos.selecciones', [
            'equipos' => $equipos
        ]);

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
}
