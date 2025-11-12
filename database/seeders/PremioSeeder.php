<?php

namespace Database\Seeders;

use App\Models\Premio;
use Illuminate\Database\Seeder;

class PremioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $premios = [
            [
                'posicion' => 1,
                'titulo_posicion' => 'Primeros 3 lugares',
                'color' => '#FFBF00',
                'nombre' => 'Televisión 55" 4K UHD',
                'descripcion' => 'Televisor de alta definición con conectividad inteligente y control por voz.',
                'imagen' => '/images/premios/tv.png',
                'pais_id' => 1,
            ],
            [
                'posicion' => 2,
                'titulo_posicion' => 'Siguientes 3 lugares',
                'color' => '#BEBEBE',
                'nombre' => 'Teléfono Xiaomi 5G',
                'descripcion' => 'Smartphone Xiaomi con conectividad 5G, pantalla AMOLED y cámara de alta resolución.',
                'imagen' => '/images/premios/phone.png',
                'pais_id' => 1,
            ],
            [
                'posicion' => 3,
                'titulo_posicion' => 'Siguientes 2 lugares',
                'color' => '#A0522D',
                'nombre' => 'Smartwatch deportivo',
                'descripcion' => 'Reloj inteligente con monitor de ritmo cardíaco y seguimiento de actividad física.',
                'imagen' => '/images/premios/smartwatch.png',
                'pais_id' => 1,
            ],
        ];

        foreach($premios as $premio) {
            Premio::create($premio);
        }
    }
}
