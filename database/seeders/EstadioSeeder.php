<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadios = [
            [
                'nombre' => 'AHMAD BIN ALI'
            ],
            [
                'nombre' => 'AL BAYT'
            ],
            [
                'nombre' => 'AL JANOUB'
            ],
            [
                'nombre' => 'AL THUMAMA'
            ],
            [
                'nombre' => 'CIUDAD DE LA EDUCACIÓN'
            ],
            [
                'nombre' => 'INTERNACIONAL KHALIFA'
            ],
            [
                'nombre' => 'LUSAIL'
            ],
            [
                'nombre' => '974'
            ]
        ];

        DB::table('estadios')->insert($estadios);
    }
}
