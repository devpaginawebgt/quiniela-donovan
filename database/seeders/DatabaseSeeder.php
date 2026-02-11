<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CodigoSeeder::class,
            CountrySeeder::class,
            UserSeeder::class,
            EquipoSeeder::class,
            EstadioSeeder::class,
            JornadaSeeder::class,
            PartidoSeeder::class,
            EquipoPartidoSeeder::class,
            ResultadoPartidoSeeder::class,
            PremioSeeder::class,
            PrediccionSeeder::class
        ]);
    }
}
