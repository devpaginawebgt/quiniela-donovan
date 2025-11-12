<?php 

namespace App\Http\Services;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Builder;

class GrupoService {

    public function getGrupos()
    {
        return collect([
            [ 'value' => 1, 'name' => 'A' ],
            [ 'value' => 2, 'name' => 'B' ],
            [ 'value' => 3, 'name' => 'C' ],
            [ 'value' => 4, 'name' => 'D' ],
            [ 'value' => 5, 'name' => 'E' ],
            [ 'value' => 6, 'name' => 'F' ],
            [ 'value' => 7, 'name' => 'G' ],
            [ 'value' => 8, 'name' => 'H' ],
        ]);
    }

    public function getGrupo($grupo)
    {

        $grupos = $this->getGrupos();

        return $grupos->firstWhere('value', $grupo);

    }

    public function getEquiposGrupo(int $grupo)
    {
        return Equipo::select([
            'id', 
            'nombre', 
            'imagen', 
            'descripcion', 
            'goles_favor', 
            'goles_contra', 
            'partidos_jugados', 
            'partidos_ganados', 
            'partidos_perdidos', 
            'partidos_empatados', 
            'puntos'
        ])
            ->where('grupo', $grupo)
            ->orderBy('puntos', 'desc')
            ->orderBy('nombre', 'asc')
            ->get();
    }

}