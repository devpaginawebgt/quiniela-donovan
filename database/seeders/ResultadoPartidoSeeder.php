<?php

namespace Database\Seeders;

use App\Models\ResultadoPartido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultadoPartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resultados = [
            [
                'partido_id' => 1,
                'goles_equipo_1' => 1,
                'goles_equipo_2' => 2,
                'equipo_ganador_id' => 2,
            ]
        ];

        foreach($resultados as $resultado) {

            ResultadoPartido::create($resultado);

        }
    }
}
