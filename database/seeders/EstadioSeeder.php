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
                'nombre' => 'Toronto Stadium',
                'descripcion' => 'Estadio moderno ubicado en Toronto, diseñado para albergar grandes eventos deportivos y espectáculos internacionales.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'BC Place Vancouver',
                'descripcion' => 'Icónico estadio con techo retráctil, reconocido por su arquitectura y versatilidad para múltiples disciplinas.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Estadio Ciudad de México',
                'descripcion' => 'Uno de los estadios más emblemáticos del mundo, con gran capacidad y una larga historia futbolística.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Estadio Guadalajara',
                'descripcion' => 'Estadio moderno con diseño vanguardista, sede de importantes eventos deportivos nacionales e internacionales.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Estadio Monterrey',
                'descripcion' => 'Estadio de última generación ubicado al pie de las montañas, reconocido por su tecnología y diseño.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Atlanta Stadium',
                'descripcion' => 'Estadio innovador con techo retráctil, pensado para ofrecer una experiencia premium a los aficionados.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Boston Stadium',
                'descripcion' => 'Complejo deportivo histórico adaptado a estándares modernos para eventos de alto nivel.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Dallas Stadium',
                'descripcion' => 'Estadio de gran capacidad con infraestructura tecnológica avanzada y diseño imponente.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Houston Stadium',
                'descripcion' => 'Estadio cubierto ideal para eventos masivos, diseñado para brindar comodidad y visibilidad.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Kansas City Stadium',
                'descripcion' => 'Estadio reconocido por la pasión de su afición y su ambiente vibrante en cada evento.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Los Angeles Stadium',
                'descripcion' => 'Complejo deportivo ultramoderno, uno de los más avanzados tecnológicamente del mundo.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Miami Stadium',
                'descripcion' => 'Estadio contemporáneo ubicado en una zona estratégica, ideal para grandes eventos internacionales.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'New York/New Jersey Stadium',
                'descripcion' => 'Estadio de referencia en la costa este, con capacidad para albergar eventos de talla mundial.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Philadelphia Stadium',
                'descripcion' => 'Estadio moderno con fuerte identidad deportiva y excelentes instalaciones para el público.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'San Francisco Bay Area Stadium',
                'descripcion' => 'Estadio sostenible y tecnológicamente avanzado, ubicado en el corazón del área de la bahía.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Seattle Stadium',
                'descripcion' => 'Estadio multifuncional conocido por su ambiente intenso y diseño funcional.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ]
        ];

        DB::table('estadios')->insert($estadios);
    }
}
