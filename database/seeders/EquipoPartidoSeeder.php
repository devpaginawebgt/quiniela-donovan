<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoPartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipoPartidos = [
            [
                'partido_id' =>  1,
                'equipo_1'   =>  1,
                'equipo_2'   =>  2
            ],
            [
                'partido_id' =>  2,
                'equipo_1'   =>  3,
                'equipo_2'   =>  4
            ],
            [
                'partido_id'        =>  3,
                'equipo_1'   =>  5,
                'equipo_2'   =>  6
            ],
            [
                'partido_id'        =>  4,
                'equipo_1'   =>  7,
                'equipo_2'   =>  8
            ],
            [
                'partido_id'        =>  5,
                'equipo_1'   =>  9,
                'equipo_2'   =>  10
            ],
            [
                'partido_id'        =>  6,
                'equipo_1'   =>  14,
                'equipo_2'   =>  15
            ],
            [
                'partido_id'        =>  7,
                'equipo_1'   =>  11,
                'equipo_2'   =>  12
            ],
            [
                'partido_id'        =>  8,
                'equipo_1'   =>  13,
                'equipo_2'   =>  16
            ],

            [
                'partido_id'        =>  9,
                'equipo_1'   =>  23,
                'equipo_2'   =>  24
            ],
            [
                'partido_id'        =>  10,
                'equipo_1'   =>  18,
                'equipo_2'   =>  19
            ],
            [
                'partido_id'        =>  11,
                'equipo_1'   =>  17,
                'equipo_2'   =>  20
            ],
            [
                'partido_id'        =>  12,
                'equipo_1'   =>  21,
                'equipo_2'   =>  22
            ],

            [
                'partido_id'        =>  13,
                'equipo_1'   =>  27,
                'equipo_2'   =>  28
            ],
            [
                'partido_id'        =>  14,
                'equipo_1'   =>  31,
                'equipo_2'   =>  32
            ],
            [
                'partido_id'        =>  15,
                'equipo_1'   =>  29,
                'equipo_2'   =>  30
            ],
            [
                'partido_id'        =>  16,
                'equipo_1'   =>  25,
                'equipo_2'   =>  26
            ],

            [
                'partido_id'        =>  17,
                'equipo_1'   =>  8,
                'equipo_2'   =>  6
            ],
            [
                'partido_id'        =>  18,
                'equipo_1'   =>  1,
                'equipo_2'   =>  3
            ],
            [
                'partido_id'        =>  19,
                'equipo_1'   =>  2,
                'equipo_2'   =>  4
            ],
            [
                'partido_id'        =>  20,
                'equipo_1'   =>  5,
                'equipo_2'   =>  7
            ],

            [
                'partido_id'        =>  21,
                'equipo_1'   =>  15,
                'equipo_2'   =>  16
            ],
            [
                'partido_id'        =>  22,
                'equipo_1'   =>  12,
                'equipo_2'   =>  10
            ],
            [
                'partido_id'        =>  23,
                'equipo_1'   =>  13,
                'equipo_2'   =>  14
            ],
            [
                'partido_id'        =>  24,
                'equipo_1'   =>  9,
                'equipo_2'   =>  11
            ],

            [
                'partido_id'        =>  25,
                'equipo_1'   =>  19,
                'equipo_2'   =>  20
            ],
            [
                'partido_id'        =>  26,
                'equipo_1'   =>  21,
                'equipo_2'   =>  23
            ],
            [
                'partido_id'        =>  27,
                'equipo_1'   =>  24,
                'equipo_2'   =>  22
            ],
            [
                'partido_id'        =>  28,
                'equipo_1'   =>  17,
                'equipo_2'   =>  18
            ],

            [
                'partido_id'        =>  29,
                'equipo_1'   =>  28,
                'equipo_2'   =>  26
            ],
            [
                'partido_id'        =>  30,
                'equipo_1'   =>  32,
                'equipo_2'   =>  30
            ],
            [
                'partido_id'        =>  31,
                'equipo_1'   =>  25,
                'equipo_2'   =>  27
            ],
            [
                'partido_id'        =>  32,
                'equipo_1'   =>  29,
                'equipo_2'   =>  31
            ],

            [
                'partido_id'        =>  33,
                'equipo_1'   =>  4,
                'equipo_2'   =>  1
            ],
            [
                'partido_id'        =>  34,
                'equipo_1'   =>  2,
                'equipo_2'   =>  3
            ],
            [
                'partido_id'        =>  35,
                'equipo_1'   =>  8,
                'equipo_2'   =>  5
            ],
            [
                'partido_id'        =>  36,
                'equipo_1'   =>  6,
                'equipo_2'   =>  7
            ],

            [
                'partido_id'        =>  37,
                'equipo_1'   =>  15,
                'equipo_2'   =>  13
            ],
            [
                'partido_id'        =>  38,
                'equipo_1'   =>  16,
                'equipo_2'   =>  14
            ],
            [
                'partido_id'        =>  39,
                'equipo_1'   =>  10,
                'equipo_2'   =>  11
            ],
            [
                'partido_id'        =>  40,
                'equipo_1'   =>  12,
                'equipo_2'   =>  9
            ],

            [
                'partido_id'        =>  41,
                'equipo_1'   =>  24,
                'equipo_2'   =>  21
            ],
            [
                'partido_id'        =>  42,
                'equipo_1'   =>  22,
                'equipo_2'   =>  23
            ],
            [
                'partido_id'        =>  43,
                'equipo_1'   =>  19,
                'equipo_2'   =>  17
            ],
            [
                'partido_id'        =>  44,
                'equipo_1'   =>  20,
                'equipo_2'   =>  18
            ],

            [
                'partido_id'        =>  45,
                'equipo_1'   =>  30,
                'equipo_2'   =>  31
            ],
            [
                'partido_id'        =>  46,
                'equipo_1'   =>  32,
                'equipo_2'   =>  29
            ],
            [
                'partido_id'        =>  47,
                'equipo_1'   =>  26,
                'equipo_2'   =>  27
            ],
            [
                'partido_id'        =>  48,
                'equipo_1'   =>  28,
                'equipo_2'   =>  25
            ],
        ];

        DB::table('equipo_partidos')->insert($equipoPartidos);
    }
}
