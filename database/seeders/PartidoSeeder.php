<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->subDays(1)->toDateTimeString(),
                'estadio_id'    => 1
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1, 
                'fecha_partido' => Carbon::now()->subHours(2)->toDateTimeString(),
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->subMinutes(2)->toDateTimeString(), 
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addMinutes(2)->toDateTimeString(),
                'estadio_id'    => 2,
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1, 
                'fecha_partido' => Carbon::now()->addMinutes(8)->toDateTimeString(),
                'estadio_id'    => 7
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addMinutes(15)->toDateTimeString(),
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addHours(2)->toDateTimeString(),
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addDays(2)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 5
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addDays(2)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 2
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addDays(2)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addDays(5)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addDays(5)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 1
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addDays(5)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 3
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addDays(5)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addDays(6)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  1,
                'fecha_partido' => Carbon::now()->addDays(6)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 7
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(10)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(10)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(10)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(10)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 2
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(11)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(11)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(11)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(11)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 7
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(12)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(12)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(12)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(12)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 2
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(13)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 3
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(13)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(13)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  2,
                'fecha_partido' => Carbon::now()->addDays(13)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 7
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(18)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 2
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(18)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(18)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(18)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 4
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(19)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(19)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 3
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(19)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 7
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(19)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 8
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(20)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 1
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(20)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 4
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(20)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 6
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(20)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 2
            ],

            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(21)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 3
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(21)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 5
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(21)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 8
            ],
            [
                'fase'      =>  'GRUPOS',
                'jornada'   =>  3,
                'fecha_partido' => Carbon::now()->addDays(21)->addHours(rand(1,3))->toDateTimeString(),
                'estadio_id'    => 7
            ],
        ];

        DB::table('partidos')->insert($partidos);
    }
}
