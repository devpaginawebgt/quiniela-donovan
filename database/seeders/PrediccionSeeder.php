<?php

namespace Database\Seeders;

use App\Models\Preccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrediccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $predicciones = [
            [
                'user_id' => 1,
                'partido_id' => 1,
                'goles_equipo_1' => 2,
                'goles_equipo_2' => 2,
            ],
            [
                'user_id' => 1,
                'partido_id' => 2,
                'goles_equipo_1' => 2,
                'goles_equipo_2' => 2,
            ],
        ];

        foreach($predicciones as $prediccion) {

            Preccion::create($prediccion);

        }

        $predicciones_user_1 = 12;

        for ($i = 0; $i < $predicciones_user_1; $i++) {
            Preccion::factory()->create([
                'user_id' => 1,
                'partido_id' => $i + 3,
            ]);
        }

        $predicciones_revisor = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13];

        foreach($predicciones_revisor as $id_partido) {

            Preccion::factory()->create([
                'user_id' => 2,
                'partido_id' => $id_partido,
            ]);

            Preccion::factory()->create([
                'user_id' => 3,
                'partido_id' => $id_partido,
            ]);

            Preccion::factory()->create([
                'user_id' => 4,
                'partido_id' => $id_partido,
            ]);

        }
    }
}
