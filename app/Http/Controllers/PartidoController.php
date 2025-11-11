<?php

namespace App\Http\Controllers;

use App\Http\Resources\Partido\PartidoResource;
use App\Http\Services\EquipoService;
use App\Http\Services\PartidoService;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    use ApiResponse;
    
    public function __construct(
        private readonly PartidoService $partidoService,
        private readonly EquipoService $equipoService
    ) {}

    public function getJornadas() 
    {

        $jornadas = $this->partidoService->getJornadas();

        return $this->successResponse($jornadas);

    }

    public function getPartidosJornada(Request $request, string $get_jornada)
    {
    
        $get_jornada = (int)$get_jornada;

        if ( empty($get_jornada) ) {

            return $this->errorResponse('No se encontró la jornada', 422);

        }

        $jornada = $this->partidoService->getJornada($get_jornada);

        if ( empty($jornada) ) {

            return $this->errorResponse('No se encontró la jornada', 422);

        }

        $partidos = $this->partidoService->getPartidosJornada($get_jornada);

        $partidos = PartidoResource::collection($partidos);

        return $this->successResponse($partidos);

    }

}
