<?php

namespace App\Http\Resources\Partido;

use App\Http\Resources\Equipo\EquipoPartidoResource;
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
        // Agregar estado de partido

        $estado = 'Por jugar';

        switch($this->partido->estado) {
            case 1:
                $estado = 'Partido finalizado';
                break;
            case 2:
                $estado = '¡Partido en curso!';
                break;
            default:
                $estado = 'Por jugar';
                break;
        }

        // Cambiar zona horaria para usuario

        $user_timezone = $request->user()->country->timezone;
        
        $fecha_partido = $this->partido->fecha_partido;
        $fecha_partido->setTimezone($user_timezone);

        return [
            'id' => $this->partido->id,            
            'fechaPartido' => $fecha_partido->format('Y-m-d H:i A'),
            'jugado' => $this->partido->jugado === 1,
            'idEstado' => $this->partido->estado,
            'jornada' => $this->partido->jornada_id,
            'estado' => $estado,

            'equipoUno' => new EquipoPartidoResource($this->equipoUno),
            'equipoDos' => new EquipoPartidoResource($this->equipoDos),
        ];
    }
}
