<?php

namespace Database\Seeders;

use App\Http\Services\TestingService;
use App\Models\EquipoPartido;
use App\Models\Partido;
use App\Models\ResultadoPartido;
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

        // $jornada1 = TestingService::jornadaUno();
        // $jornada2 = TestingService::jornadaDos();
        // $jornada3 = TestingService::jornadaTres();
        // $deciseisavos = TestingService::dieciseisavos();
        // $octavos = TestingService::octavos();
        // $cuartos = TestingService::cuartos();
        // $semifinales = TestingService::semifinales();
        // $tercer_lugar = TestingService::tercerLugar();
        // $finales = TestingService::finales();

        // $partidos = array_merge(
        //     $jornada1,
        //     $jornada2,
        //     $jornada3,
        //     $deciseisavos,
        //     $octavos,
        //     $cuartos,
        //     $semifinales,
        //     $tercer_lugar,
        //     $finales
        // );

        // foreach($partidos as $partido) {

        //     $equipo_1 = $partido['equipo_1'];
        //     $equipo_2 = $partido['equipo_2'];
            
        //     unset($partido['equipo_1']);
        //     unset($partido['equipo_2']);

        //     $goles_equipo_1 = $partido['goles_equipo_1'];
        //     $goles_equipo_2 = $partido['goles_equipo_2'];
        //     $equipo_ganador_id = $partido['equipo_ganador_id'];

        //     unset($partido['goles_equipo_1']);
        //     unset($partido['goles_equipo_2']);
        //     unset($partido['equipo_ganador_id']);

        //     $partido_db = Partido::create($partido);

        //     $equipo_partido = EquipoPartido::create([
        //         'partido_id' => $partido_db->id,
        //         'equipo_1' => $equipo_1,
        //         'equipo_2' => $equipo_2
        //     ]);

            // $resultado = ResultadoPartido::create([
            //     'partido_id' => $partido_db->id,
            //     'goles_equipo_1' => $goles_equipo_1,
            //     'goles_equipo_2' => $goles_equipo_2,
            //     'equipo_ganador_id' => $equipo_ganador_id,
            // ]);

        // }
    }
}
