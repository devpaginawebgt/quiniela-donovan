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
                'nombre' => 'Al Janoub',
                'descripcion' => 'Dispone de un techo operable y un innovador sistema de refrigeración alimentado por energía solar. Tiene capacidad para 40.000 asientos, de los cuales 20.000 son desmontables, pensados para transportar a otro país que necesite tal infraestructura o como legado del torneo.',
                'imagen' => '/images/estadios/aljanoub.jpg'
            ],
            [
                'nombre' => 'Ciudad de la Educación',
                'descripcion' => 'Conocido también como el "Diamante del Desierto", fue la primera sede del Mundial calificada con cinco estrellas por su diseño y construcción por parte del Sistema Global de Evaluación de la Sostenibilidad. Está concebido como punto de encuentro social del Campus, cuenta con áreas de reunión y zonas verdes. Su capacidad es de 40.000 espectadores, que después del mundial se reducirá a 20.000.',
                'imagen' => '/images/estadios/ciudaddelaeducacion.jpg'
            ],
            [
                'nombre' => 'Ahmad Bin Ali',
                'descripcion' => 'Diseñado por el estudio de ingeniería y arquitectura Ramboll, destaca por su fachada brillante, compuesta por motivos característicos del país: la importancia de la familia, la belleza del desierto, la flora y la fauna autóctonas y el comercio local e internacional.',
                'imagen' => '/images/estadios/ahmadbinali.jpg'
            ],
            [
                'nombre' => 'Al Thumama',
                'descripcion' => 'Inspirado en la "gahfiya", un gorro tejido tradicional que llevan los hombres y niños de Oriente Medio y que simboliza dignidad e independencia, es obra del arquitecto qatarí Ibrahim M. Jaidah en colaboración con el estudio Fenwick Iribarren.',
                'imagen' => '/images/estadios/althumama.jpg'
            ],
            [
                'nombre' => 'Internacional Khalifa',
                'descripcion' => 'Cuenta con una larga trayectoria como sede de grandes eventos deportivos desde 1976. Como estadio nacional de Qatar, pasó por una amplia remodelación para el Mundial de fútbol. Se añadió una grada y una nueva fachada, así como un innovador sistema de iluminación LED.',
                'imagen' => '/images/estadios/internacionalkhalifa.jpg'
            ],
            [
                'nombre' => 'Al Bayt',
                'descripcion' => 'Este espectacular estadio se inspira en las "bayt al sha\'ar", tiendas de campaña utilizadas históricamente por los pueblos nómadas de Qatar y la región del Golfo. Ubicado en Al Khor, es obra de la firma Dar Al-Handasah. Su objetivo es honrar el pasado y presente de Qatar con una mirada hacia el futuro. Con una capacidad para 60.000 personas, en él se disputará el partido inaugural del Mundial, además de otros ocho encuentros de la competición.',
                'imagen' => '/images/estadios/AlBayt.jpg'
            ],
            [
                'nombre' => '974',
                'descripcion' => 'Cuenta con una larga trayectoria como sede de grandes eventos deportivos desde 1976. Como estadio nacional de Qatar, pasó por una amplia remodelación para el Mundial de fútbol. Se añadió una grada y una nueva fachada, así como un innovador sistema de iluminación LED.',
                'imagen' => '/images/estadios/974.jpg'
            ],
            [
                'nombre' => 'Lusail',
                'descripcion' => 'Es la joya de la corona. Es la sede de torneos más grande de Qatar y está situado en la ciudad de la que toma su nombre. El estudio Foster+ Partners firma el diseño de esta maravilla inspirada en las luces y sombras de la linterna "fanar". Su forma y fachada emulan los intrincados motivos decorativos de los cuencos y otros recipientes característicos de la edad de oro del arte y la artesanía en el mundo árabe e islámico.',
                'imagen' => '/images/estadios/Lusail.jpg'
            ]
        ];

        DB::table('estadios')->insert($estadios);
    }
}
