<?php 

namespace App\Http\Services;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Builder;

class GrupoService {

    public function getGrupos()
    {
        return collect([
            [ 'value' => 1, 'name' => 'A', 'is_current' => true ],
            [ 'value' => 2, 'name' => 'B', 'is_current' => false ],
            [ 'value' => 3, 'name' => 'C', 'is_current' => false ],
            [ 'value' => 4, 'name' => 'D', 'is_current' => false ],
            [ 'value' => 5, 'name' => 'E', 'is_current' => false ],
            [ 'value' => 6, 'name' => 'F', 'is_current' => false ],
            [ 'value' => 7, 'name' => 'G', 'is_current' => false ],
            [ 'value' => 8, 'name' => 'H', 'is_current' => false ],
            [ 'value' => 9, 'name' => 'I', 'is_current' => false ],
            [ 'value' => 10, 'name' => 'J', 'is_current' => false ],
            [ 'value' => 11, 'name' => 'K', 'is_current' => false ],
            [ 'value' => 12, 'name' => 'L', 'is_current' => false ],
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