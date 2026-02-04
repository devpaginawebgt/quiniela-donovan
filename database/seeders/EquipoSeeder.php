<?php

namespace Database\Seeders;

use App\Http\Services\TestingService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipos = TestingService::equipos();

        DB::table('equipos')->insert($equipos);
    }
}
