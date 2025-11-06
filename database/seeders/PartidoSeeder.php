<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partidos = [
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-20:10:00:00',
                'estadio_id'    => 1
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-21:04:00:00',
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-21:07:00:00',
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-21:10:00:00',
                'estadio_id'    => 2
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-22:04:00:00',
                'estadio_id'    => 7
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-22:07:00:00',
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-22:10:00:00',
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-22:13:00:00',
                'estadio_id'    => 5
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-23:04:00:00',
                'estadio_id'    => 2
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-23:07:00:00',
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-23:10:00:00',
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-23:13:00:00',
                'estadio_id'    => 1
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-24:04:00:00',
                'estadio_id'    => 3
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-24:07:00:00',
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-24:10:00:00',
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '1',
                'fecha_partido' =>'2025-11-24:13:00:00',
                'estadio_id'    => 7
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-25:04:00:00',
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-25:07:00:00',
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-25:10:00:00',
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-25:13:00:00',
                'estadio_id'    => 2
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-26:04:00:00',
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-26:07:00:00',
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-26:10:00:00',
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-26:13:00:00',
                'estadio_id'    => 7
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-27:04:00:00',
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-27:07:00:00',
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-27:10:00:00',
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-27:13:00:00',
                'estadio_id'    => 2
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-28:04:00:00',
                'estadio_id'    => 3
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-28:07:00:00',
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-28:10:00:00',
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '2',
                'fecha_partido' =>'2025-11-28:13:00:00',
                'estadio_id'    => 7
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-11-29:09:00:00',
                'estadio_id'    => 2
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-11-29:09:00:00',
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-11-29:13:00:00',
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-11-29:13:00:00',
                'estadio_id'    => 4
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-11-30:09:00:00',
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-11-30:09:00:00',
                'estadio_id'    => 3
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-11-30:13:00:00',
                'estadio_id'    => 7
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-11-30:13:00:00',
                'estadio_id'    => 8
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-12-01:09:00:00',
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-12-01:09:00:00',
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-12-01:13:00:00',
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-12-01:13:00:00',
                'estadio_id'    => 2
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-12-02:09:00:00',
                'estadio_id'    => 3
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-12-02:09:00:00',
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-12-02:13:00:00',
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  '3',
                'fecha_partido' =>'2025-12-02:13:00:00',
                'estadio_id'    => 7
            ],
        ];

        DB::table('partidos')->insert($partidos);
    }
}
