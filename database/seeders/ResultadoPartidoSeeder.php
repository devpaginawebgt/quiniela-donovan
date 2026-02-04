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
            // [
            //     'partido_id' => 1,
            //     'goles_equipo_1' => 1,
            //     'goles_equipo_2' => 2,
            //     'equipo_ganador_id' => 2,
            // ],
            // [
            //     'partido_id' => 2 ,
            //     'goles_equipo_1' => 2,
            //     'goles_equipo_2' => 2,
            //     'equipo_ganador_id' => null,
            // ],
            // [
            //     'partido_id' => 3,
            //     'goles_equipo_1' => 3,
            //     'goles_equipo_2' => 0,
            //     'equipo_ganador_id' => 5,
            // ],
            // [
            //     'partido_id' => 4,
            //     'goles_equipo_1' => 0,
            //     'goles_equipo_2' => 1,
            //     'equipo_ganador_id' => 8,
            // ],
            // [
            //     'partido_id' => 5,
            //     'goles_equipo_1' => 1,
            //     'goles_equipo_2' => 1,
            //     'equipo_ganador_id' => null,
            // ],
            // [
            //     'partido_id' => 6,
            //     'goles_equipo_1' => 0,
            //     'goles_equipo_2' => 0,
            //     'equipo_ganador_id' => null,
            // ],
            // [
            //     'partido_id' => 7,
            //     'goles_equipo_1' => 4,
            //     'goles_equipo_2' => 2,
            //     'equipo_ganador_id' => 11,
            // ],
            // [
            //     'partido_id' => 8,
            //     'goles_equipo_1' => 2,
            //     'goles_equipo_2' => 3,
            //     'equipo_ganador_id' => 16,
            // ],
            // [
            //     'partido_id' => 9,
            //     'goles_equipo_1' => 5,
            //     'goles_equipo_2' => 1,
            //     'equipo_ganador_id' => 23,
            // ],
            // [
            //     'partido_id' => 10,
            //     'goles_equipo_1' => 0,
            //     'goles_equipo_2' => 2,
            //     'equipo_ganador_id' => 19,
            // ],
            // [
            //     'partido_id' => 11,
            //     'goles_equipo_1' => 3,
            //     'goles_equipo_2' => 3,
            //     'equipo_ganador_id' => null,
            // ],
            // [
            //     'partido_id' => 12,
            //     'goles_equipo_1' => 1,
            //     'goles_equipo_2' => 0,
            //     'equipo_ganador_id' => 21,
            // ],
            // [
            //     'partido_id' => 13,
            //     'goles_equipo_1' => 2,
            //     'goles_equipo_2' => 4,
            //     'equipo_ganador_id' => 28,
            // ],
            // [
            //     'partido_id' => 14,
            //     'goles_equipo_1' => 3,
            //     'goles_equipo_2' => 1,
            //     'equipo_ganador_id' => 31,
            // ],
        ];

        foreach($resultados as $resultado) {

            ResultadoPartido::create($resultado);

        }
    }
}
