<?php

namespace App\Http\Resources\Partido;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->partido->id,
            'fase' => $this->partido->fase,
            'jornada' => $this->partido->jornada,
            'fechaPartido' => $this->partido->fecha_partido,
            'jugado' => $this->partido->jugado == 1 ? 'Si' : 'No',

            'equipoUno' => $this->equipoUno,
            'equipoDos' => $this->equipoDos,
        ];
    }
}
