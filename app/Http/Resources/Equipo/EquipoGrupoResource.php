<?php

namespace App\Http\Resources\Equipo;

use App\Http\Services\HelperService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipoGrupoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $stats = [];

        $stats[] = ['PJ' => $this->partidos_jugados];
        $stats[] = ['PG' => $this->partidos_ganados];
        $stats[] = ['PE' => $this->partidos_empatados];
        $stats[] = ['PP' => $this->partidos_perdidos];
        $stats[] = ['GF' => $this->goles_favor];
        $stats[] = ['GC' => $this->goles_contra];
        $stats[] = ['Puntos' => $this->puntos];

        return [
            'id' => $this->id,
            'name' => $this->nombre,
            'image' => HelperService::ImagePath($this->imagen),
            'stats' => $stats,
        ];
    }
}
