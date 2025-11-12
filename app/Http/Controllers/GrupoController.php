<?php

namespace App\Http\Controllers;

use App\Http\Resources\Equipo\EquipoGrupoResource;
use App\Http\Services\EquipoService;
use App\Http\Services\GrupoService;
use App\Http\Services\PartidoService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly GrupoService $grupoService,
        private readonly EquipoService $equipoService,
        private readonly PartidoService $partidoService,
    ) {}

    public function getGrupos(Request $request)
    {
        $grupos = $this->grupoService->getGrupos();

        return $this->successResponse($grupos);
    }

    public function getEquiposGrupo(string $get_grupo)
    {        
        $get_grupo = (int)$get_grupo;

        if ( empty($get_grupo) ) {

            return $this->errorResponse('No se encontró el grupo', 422);

        }

        $grupo = $this->grupoService->getGrupo($get_grupo);

        if ( empty($grupo) ) {

            return $this->errorResponse('No se encontró el grupo', 422);

        }

        $data = [];

        $equipos = $this->grupoService->getEquiposGrupo($get_grupo);

        $data['equipos'] = EquipoGrupoResource::collection($equipos);

        $data['partidos'] = $this->partidoService->getPartidosGrupo($get_grupo);

        return $this->successResponse($data);
    }
}
