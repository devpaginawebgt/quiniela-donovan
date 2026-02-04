<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipos = [

            // ======================
            // GRUPO A (1)
            // ======================
            [
                'nombre' => 'México',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección nacional de fútbol de México, una de las más representativas de la Concacaf.',
                'grupo' => 1
            ],
            [
                'nombre' => 'Sudáfrica',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección africana que fue anfitriona del Mundial 2010.',
                'grupo' => 1
            ],
            [
                'nombre' => 'República de Corea',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección asiática conocida por su disciplina y regularidad mundialista.',
                'grupo' => 1
            ],
            [
                'nombre' => 'DEN/MKD/CZE/IRL',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea pendiente de definir.',
                'grupo' => 1
            ],

            // ======================
            // GRUPO B (2)
            // ======================
            [
                'nombre' => 'Canadá',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección norteamericana en crecimiento y coanfitriona del Mundial 2026.',
                'grupo' => 2
            ],
            [
                'nombre' => 'ITA/NIR/WAL/BIH',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea pendiente de definir.',
                'grupo' => 2
            ],
            [
                'nombre' => 'Catar',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección asiática y campeona de la Copa Asiática 2019.',
                'grupo' => 2
            ],
            [
                'nombre' => 'Suiza',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea destacada por su solidez defensiva.',
                'grupo' => 2
            ],

            // ======================
            // GRUPO C (3)
            // ======================
            [
                'nombre' => 'Brasil',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección más laureada de la historia de los Mundiales.',
                'grupo' => 3
            ],
            [
                'nombre' => 'Marruecos',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección africana revelación del Mundial 2022.',
                'grupo' => 3
            ],
            [
                'nombre' => 'Haití',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección caribeña con participaciones históricas en mundiales.',
                'grupo' => 3
            ],
            [
                'nombre' => 'Escocia',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea con gran tradición futbolística.',
                'grupo' => 3
            ],

            // ======================
            // GRUPO D (4)
            // ======================
            [
                'nombre' => 'EE. UU.',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección anfitriona del Mundial 2026 y potencia emergente.',
                'grupo' => 4
            ],
            [
                'nombre' => 'Paraguay',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección sudamericana reconocida por su garra competitiva.',
                'grupo' => 4
            ],
            [
                'nombre' => 'Australia',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección oceánica afiliada a la AFC.',
                'grupo' => 4
            ],
            [
                'nombre' => 'TUR/ROU/SVK/KOS',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea pendiente de definir.',
                'grupo' => 4
            ],

            // ======================
            // GRUPO E (5)
            // ======================
            [
                'nombre' => 'Alemania',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección tetracampeona del mundo.',
                'grupo' => 5
            ],
            [
                'nombre' => 'Curazao',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección caribeña en constante crecimiento.',
                'grupo' => 5
            ],
            [
                'nombre' => 'Costa de Marfil',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección africana con talento físico y técnico.',
                'grupo' => 5
            ],
            [
                'nombre' => 'Ecuador',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección sudamericana conocida por su intensidad.',
                'grupo' => 5
            ],

            // ======================
            // GRUPO F (6)
            // ======================
            [
                'nombre' => 'Países Bajos',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea histórica y subcampeona mundial.',
                'grupo' => 6
            ],
            [
                'nombre' => 'Japón',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección asiática destacada por su orden táctico.',
                'grupo' => 6
            ],
            [
                'nombre' => 'UKR/SWE/POL/ALB',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea pendiente de definir.',
                'grupo' => 6
            ],
            [
                'nombre' => 'Túnez',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección africana con presencia constante en mundiales.',
                'grupo' => 6
            ],

            // ======================
            // GRUPO G (7)
            // ======================
            [
                'nombre' => 'Bélgica',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea con una generación dorada reciente.',
                'grupo' => 7
            ],
            [
                'nombre' => 'Egipto',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección africana histórica del norte del continente.',
                'grupo' => 7
            ],
            [
                'nombre' => 'Irán',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección asiática habitual en Copas del Mundo.',
                'grupo' => 7
            ],
            [
                'nombre' => 'Nueva Zelanda',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección oceánica dominante en su confederación.',
                'grupo' => 7
            ],

            // ======================
            // GRUPO H (8)
            // ======================
            [
                'nombre' => 'España',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección campeona del mundo en 2010.',
                'grupo' => 8
            ],
            [
                'nombre' => 'Islas de Cabo Verde',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección africana en crecimiento competitivo.',
                'grupo' => 8
            ],
            [
                'nombre' => 'Arabia Saudí',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección asiática con participaciones mundialistas.',
                'grupo' => 8
            ],
            [
                'nombre' => 'Uruguay',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección bicampeona del mundo y potencia sudamericana.',
                'grupo' => 8
            ],

            // ======================
            // GRUPO I (9)
            // ======================
            [
                'nombre' => 'Francia',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección bicampeona del mundo y vigente subcampeona.',
                'grupo' => 9
            ],
            [
                'nombre' => 'Senegal',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección africana campeona de la Copa Africana.',
                'grupo' => 9
            ],
            [
                'nombre' => 'BOL/SUR/IRQ',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección pendiente de definir.',
                'grupo' => 9
            ],
            [
                'nombre' => 'Noruega',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea con figuras destacadas.',
                'grupo' => 9
            ],

            // ======================
            // GRUPO J (10)
            // ======================
            [
                'nombre' => 'Argentina',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección campeona del mundo en 2022.',
                'grupo' => 10
            ],
            [
                'nombre' => 'Argelia',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección africana campeona continental.',
                'grupo' => 10
            ],
            [
                'nombre' => 'Austria',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea con sólida estructura táctica.',
                'grupo' => 10
            ],
            [
                'nombre' => 'Jordania',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección asiática en crecimiento.',
                'grupo' => 10
            ],

            // ======================
            // GRUPO K (11)
            // ======================
            [
                'nombre' => 'Portugal',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea campeona de la Eurocopa.',
                'grupo' => 11
            ],
            [
                'nombre' => 'NCL/JAM/COD',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección pendiente de definir.',
                'grupo' => 11
            ],
            [
                'nombre' => 'Uzbekistán',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección asiática emergente.',
                'grupo' => 11
            ],
            [
                'nombre' => 'Colombia',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección sudamericana con gran tradición ofensiva.',
                'grupo' => 11
            ],

            // ======================
            // GRUPO L (12)
            // ======================
            [
                'nombre' => 'Inglaterra',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección campeona del mundo en 1966.',
                'grupo' => 12
            ],
            [
                'nombre' => 'Croacia',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección europea subcampeona mundial en 2018.',
                'grupo' => 12
            ],
            [
                'nombre' => 'Ghana',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección africana con participaciones destacadas.',
                'grupo' => 12
            ],
            [
                'nombre' => 'Panamá',
                'imagen' => '/images/selecciones/argentina.jpg',
                'descripcion' => 'Selección centroamericana con debut mundialista reciente.',
                'grupo' => 12
            ],

        ];

        DB::table('equipos')->insert($equipos);
    }
}
