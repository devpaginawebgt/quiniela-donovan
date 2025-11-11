<?php

namespace App\Http\Services;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;

class UserService {

    public function getPaises()
    {
        return collect([ 
            [ 'id' => 1, 'nombre' => 'Guatemala' ], 
            [ 'id' => 2, 'nombre' => 'El Salvador' ],
            [ 'id' => 3, 'nombre' => 'Honduras' ],
            [ 'id' => 4, 'nombre' => 'Nicaragua' ],
            [ 'id' => 5, 'nombre' => 'Costa Rica'  ],
        ]);
    }

    public function getPais(string|int $id_pais)
    {
        $paises = $this->getPaises();
        
        $pais = $paises->firstWhere('id', $id_pais);

        return $pais['nombre'];
    }

    public function getParticipantes()
    {

        $participantes = User::where('status_user', 1)->get();
        
        $paises = $this->getPaises();

        $participantes->each(function($participante) use($paises) {

            $pais = $paises->firstWhere('id', $participante->pais_id);

            $participante->pais = $pais['nombre'];

        });

        // $statuses = ['Bloqueado', 'Activo'];
        // $participante->status = $statuses[$participante->status_user];

        return $participantes;

    }

    public function getRanking($id_pais)
    {
        $participantes = User::where('status_user', 1)
            ->where('pais_id', $id_pais)
            ->orderBy('puntos', 'desc')
            ->orderBy('name', 'asc')
            ->get();
        
        $paises = $this->getPaises();

        $participantes->each(function($participante) use($paises) {

            $pais = $paises->firstWhere('id', $participante->pais_id);

            $participante->pais = $pais['nombre'];
            
        });

        return $participantes;

    }

}