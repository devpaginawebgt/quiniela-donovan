<?php

namespace App\Http\Controllers;

use App\Http\Resources\Estadio\EstadioResource;
use App\Models\Estadio;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class EstadioController extends Controller
{
    use ApiResponse;

    public function verEstadios()
    {
        $estadios = Estadio::all();

        return view('modulos.sedes', [
            'estadios' => $estadios
        ]);

    }

    public function getEstadios()
    {

        $estadios = Estadio::all();

        $estadios = EstadioResource::collection($estadios);

        return $this->successResponse($estadios);

    }
}
