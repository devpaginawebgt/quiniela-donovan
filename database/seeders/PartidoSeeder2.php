<?php

namespace Database\Seeders;

use App\Models\EquipoPartido;
use App\Models\Partido;
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
        $fecha_inicial = Carbon::create(2026, 3, 1, 0, 0, 0, 'UTC');

        $partidos = [

            /*
            |--------------------------------------------------------------------------
            | JORNADA 1
            |--------------------------------------------------------------------------
            */

            /* GRUPO A */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(0)->addHours(8)->toDateTimeString(),
                'estadio_id' => 1,
                'equipo_1' => 1,
                'equipo_2' => 2,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(0)->addHours(16)->toDateTimeString(),
                'estadio_id' => 2,
                'equipo_1' => 3,
                'equipo_2' => 4,
            ],

            /* GRUPO B */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(1)->addHours(8)->toDateTimeString(),
                'estadio_id' => 3,
                'equipo_1' => 5,
                'equipo_2' => 6,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(1)->addHours(16)->toDateTimeString(),
                'estadio_id' => 4,
                'equipo_1' => 7,
                'equipo_2' => 8,
            ],

            /* GRUPO C */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(2)->addHours(8)->toDateTimeString(),
                'estadio_id' => 5,
                'equipo_1' => 9,
                'equipo_2' => 10,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(2)->addHours(16)->toDateTimeString(),
                'estadio_id' => 6,
                'equipo_1' => 11,
                'equipo_2' => 12,
            ],

            /* GRUPO D */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(3)->addHours(8)->toDateTimeString(),
                'estadio_id' => 7,
                'equipo_1' => 13,
                'equipo_2' => 14,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(3)->addHours(16)->toDateTimeString(),
                'estadio_id' => 8,
                'equipo_1' => 15,
                'equipo_2' => 16,
            ],

            /* GRUPO E */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(4)->addHours(8)->toDateTimeString(),
                'estadio_id' => 9,
                'equipo_1' => 17,
                'equipo_2' => 18,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(4)->addHours(16)->toDateTimeString(),
                'estadio_id' => 10,
                'equipo_1' => 19,
                'equipo_2' => 20,
            ],

            /* GRUPO F */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(5)->addHours(8)->toDateTimeString(),
                'estadio_id' => 11,
                'equipo_1' => 21,
                'equipo_2' => 22,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(5)->addHours(16)->toDateTimeString(),
                'estadio_id' => 12,
                'equipo_1' => 23,
                'equipo_2' => 24,
            ],

            /* GRUPO G */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(6)->addHours(8)->toDateTimeString(),
                'estadio_id' => 13,
                'equipo_1' => 25,
                'equipo_2' => 26,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(6)->addHours(16)->toDateTimeString(),
                'estadio_id' => 14,
                'equipo_1' => 27,
                'equipo_2' => 28,
            ],

            /* GRUPO H */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(7)->addHours(8)->toDateTimeString(),
                'estadio_id' => 15,
                'equipo_1' => 29,
                'equipo_2' => 30,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(7)->addHours(16)->toDateTimeString(),
                'estadio_id' => 16,
                'equipo_1' => 31,
                'equipo_2' => 32,
            ],

            /* GRUPO I */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(8)->addHours(8)->toDateTimeString(),
                'estadio_id' => 1,
                'equipo_1' => 33,
                'equipo_2' => 34,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(8)->addHours(16)->toDateTimeString(),
                'estadio_id' => 2,
                'equipo_1' => 35,
                'equipo_2' => 36,
            ],

            /* GRUPO J */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(9)->addHours(8)->toDateTimeString(),
                'estadio_id' => 3,
                'equipo_1' => 37,
                'equipo_2' => 38,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(9)->addHours(16)->toDateTimeString(),
                'estadio_id' => 4,
                'equipo_1' => 39,
                'equipo_2' => 40,
            ],

            /* GRUPO K */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(10)->addHours(8)->toDateTimeString(),
                'estadio_id' => 5,
                'equipo_1' => 41,
                'equipo_2' => 42,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(10)->addHours(16)->toDateTimeString(),
                'estadio_id' => 6,
                'equipo_1' => 43,
                'equipo_2' => 44,
            ],

            /* GRUPO L */
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(11)->addHours(8)->toDateTimeString(),
                'estadio_id' => 7,
                'equipo_1' => 45,
                'equipo_2' => 46,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 1,
                'fecha_partido' => $fecha_inicial->copy()->addDays(11)->addHours(16)->toDateTimeString(),
                'estadio_id' => 8,
                'equipo_1' => 47,
                'equipo_2' => 48,
            ],

            /*
            |--------------------------------------------------------------------------
            | JORNADA 2
            |--------------------------------------------------------------------------
            */

            /* GRUPO A */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(12)->addHours(8)->toDateTimeString(),
                'estadio_id' => 9,
                'equipo_1' => 1,
                'equipo_2' => 3,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(12)->addHours(16)->toDateTimeString(),
                'estadio_id' => 10,
                'equipo_1' => 2,
                'equipo_2' => 4,
            ],

            /* GRUPO B */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(13)->addHours(8)->toDateTimeString(),
                'estadio_id' => 11,
                'equipo_1' => 5,
                'equipo_2' => 7,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(13)->addHours(16)->toDateTimeString(),
                'estadio_id' => 12,
                'equipo_1' => 6,
                'equipo_2' => 8,
            ],

            /* GRUPO C */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(14)->addHours(8)->toDateTimeString(),
                'estadio_id' => 13,
                'equipo_1' => 9,
                'equipo_2' => 11,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(14)->addHours(16)->toDateTimeString(),
                'estadio_id' => 14,
                'equipo_1' => 10,
                'equipo_2' => 12,
            ],

            /* GRUPO D */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(15)->addHours(8)->toDateTimeString(),
                'estadio_id' => 15,
                'equipo_1' => 13,
                'equipo_2' => 15,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(15)->addHours(16)->toDateTimeString(),
                'estadio_id' => 16,
                'equipo_1' => 14,
                'equipo_2' => 16,
            ],

            /* GRUPO E */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(16)->addHours(8)->toDateTimeString(),
                'estadio_id' => 1,
                'equipo_1' => 17,
                'equipo_2' => 19,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(16)->addHours(16)->toDateTimeString(),
                'estadio_id' => 2,
                'equipo_1' => 18,
                'equipo_2' => 20,
            ],

            /* GRUPO F */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(17)->addHours(8)->toDateTimeString(),
                'estadio_id' => 3,
                'equipo_1' => 21,
                'equipo_2' => 23,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(17)->addHours(16)->toDateTimeString(),
                'estadio_id' => 4,
                'equipo_1' => 22,
                'equipo_2' => 24,
            ],

            /* GRUPO G */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(18)->addHours(8)->toDateTimeString(),
                'estadio_id' => 5,
                'equipo_1' => 25,
                'equipo_2' => 27,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(18)->addHours(16)->toDateTimeString(),
                'estadio_id' => 6,
                'equipo_1' => 26,
                'equipo_2' => 28,
            ],

            /* GRUPO H */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(19)->addHours(8)->toDateTimeString(),
                'estadio_id' => 7,
                'equipo_1' => 29,
                'equipo_2' => 31,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(19)->addHours(16)->toDateTimeString(),
                'estadio_id' => 8,
                'equipo_1' => 30,
                'equipo_2' => 32,
            ],

            /* GRUPO I */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(20)->addHours(8)->toDateTimeString(),
                'estadio_id' => 9,
                'equipo_1' => 33,
                'equipo_2' => 35,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(20)->addHours(16)->toDateTimeString(),
                'estadio_id' => 10,
                'equipo_1' => 34,
                'equipo_2' => 36,
            ],

            /* GRUPO J */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(21)->addHours(8)->toDateTimeString(),
                'estadio_id' => 11,
                'equipo_1' => 37,
                'equipo_2' => 39,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(21)->addHours(16)->toDateTimeString(),
                'estadio_id' => 12,
                'equipo_1' => 38,
                'equipo_2' => 40,
            ],

            /* GRUPO K */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(22)->addHours(8)->toDateTimeString(),
                'estadio_id' => 13,
                'equipo_1' => 41,
                'equipo_2' => 43,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(22)->addHours(16)->toDateTimeString(),
                'estadio_id' => 14,
                'equipo_1' => 42,
                'equipo_2' => 44,
            ],

            /* GRUPO L */
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(23)->addHours(8)->toDateTimeString(),
                'estadio_id' => 15,
                'equipo_1' => 45,
                'equipo_2' => 47,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 2,
                'fecha_partido' => $fecha_inicial->copy()->addDays(23)->addHours(16)->toDateTimeString(),
                'estadio_id' => 16,
                'equipo_1' => 46,
                'equipo_2' => 48,
            ],

            /*
            |--------------------------------------------------------------------------
            | JORNADA 3
            |--------------------------------------------------------------------------
            */

            /* GRUPO A */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(24)->addHours(8)->toDateTimeString(),
                'estadio_id' => 1,
                'equipo_1' => 1,
                'equipo_2' => 4,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(24)->addHours(16)->toDateTimeString(),
                'estadio_id' => 2,
                'equipo_1' => 2,
                'equipo_2' => 3,
            ],

            /* GRUPO B */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(25)->addHours(8)->toDateTimeString(),
                'estadio_id' => 3,
                'equipo_1' => 5,
                'equipo_2' => 8,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(25)->addHours(16)->toDateTimeString(),
                'estadio_id' => 4,
                'equipo_1' => 6,
                'equipo_2' => 7,
            ],

            /* GRUPO C */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(26)->addHours(8)->toDateTimeString(),
                'estadio_id' => 5,
                'equipo_1' => 9,
                'equipo_2' => 12,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(26)->addHours(16)->toDateTimeString(),
                'estadio_id' => 6,
                'equipo_1' => 10,
                'equipo_2' => 11,
            ],

            /* GRUPO D */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(27)->addHours(8)->toDateTimeString(),
                'estadio_id' => 7,
                'equipo_1' => 13,
                'equipo_2' => 16,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(27)->addHours(16)->toDateTimeString(),
                'estadio_id' => 8,
                'equipo_1' => 14,
                'equipo_2' => 15,
            ],

            /* GRUPO E */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(28)->addHours(8)->toDateTimeString(),
                'estadio_id' => 9,
                'equipo_1' => 17,
                'equipo_2' => 20,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(28)->addHours(16)->toDateTimeString(),
                'estadio_id' => 10,
                'equipo_1' => 18,
                'equipo_2' => 19,
            ],

            /* GRUPO F */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(29)->addHours(8)->toDateTimeString(),
                'estadio_id' => 11,
                'equipo_1' => 21,
                'equipo_2' => 24,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(29)->addHours(16)->toDateTimeString(),
                'estadio_id' => 12,
                'equipo_1' => 22,
                'equipo_2' => 23,
            ],

            /* GRUPO G */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(30)->addHours(8)->toDateTimeString(),
                'estadio_id' => 13,
                'equipo_1' => 25,
                'equipo_2' => 28,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(30)->addHours(16)->toDateTimeString(),
                'estadio_id' => 14,
                'equipo_1' => 26,
                'equipo_2' => 27,
            ],

            /* GRUPO H */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(31)->addHours(8)->toDateTimeString(),
                'estadio_id' => 15,
                'equipo_1' => 29,
                'equipo_2' => 32,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(31)->addHours(16)->toDateTimeString(),
                'estadio_id' => 16,
                'equipo_1' => 30,
                'equipo_2' => 31,
            ],

            /* GRUPO I */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(32)->addHours(8)->toDateTimeString(),
                'estadio_id' => 1,
                'equipo_1' => 33,
                'equipo_2' => 36,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(32)->addHours(16)->toDateTimeString(),
                'estadio_id' => 2,
                'equipo_1' => 34,
                'equipo_2' => 35,
            ],

            /* GRUPO J */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(33)->addHours(8)->toDateTimeString(),
                'estadio_id' => 3,
                'equipo_1' => 37,
                'equipo_2' => 40,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(33)->addHours(16)->toDateTimeString(),
                'estadio_id' => 4,
                'equipo_1' => 38,
                'equipo_2' => 39,
            ],

            /* GRUPO K */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(34)->addHours(8)->toDateTimeString(),
                'estadio_id' => 5,
                'equipo_1' => 41,
                'equipo_2' => 44,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(34)->addHours(16)->toDateTimeString(),
                'estadio_id' => 6,
                'equipo_1' => 42,
                'equipo_2' => 43,
            ],

            /* GRUPO L */
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(35)->addHours(8)->toDateTimeString(),
                'estadio_id' => 7,
                'equipo_1' => 45,
                'equipo_2' => 48,
            ],
            [
                'fase' => 'GRUPOS',
                'jornada' => 3,
                'fecha_partido' => $fecha_inicial->copy()->addDays(35)->addHours(16)->toDateTimeString(),
                'estadio_id' => 8,
                'equipo_1' => 46,
                'equipo_2' => 47,
            ],

            /*
            |--------------------------------------------------------------------------
            | JORNADA 4  DIECISEISAVOS DE FINAL
            |--------------------------------------------------------------------------
            */

            // 1	México	7
            // 3	República de Corea	4
            // 2	Sudáfrica	4
            // 5	Canadá	7
            // 8	Suiza	4
            // 7	Catar	4
            // 9	Brasil	7
            // 10	Marruecos	4
            // 12	Escocia	4
            // 13	EE. UU.	7
            // 15	Australia	4
            // 14	Paraguay	4
            // 17	Alemania	7
            // 20	Ecuador	4
            // 19	Costa de Marfil	4
            // 21	Países Bajos	7
            // 22	Japón	4
            // 24	Túnez	4
            // 25	Bélgica	7
            // 26	Egipto	4
            // 27	Irán	4
            // 29	España	7
            // 32	Uruguay	4
            // 31	Arabia Saudí	4
            // 33	Francia	7
            // 34	Senegal	4
            // 37	Argentina	7
            // 39	Austria	4
            // 41	Portugal	7
            // 44	Colombia	4
            // 45	Inglaterra	7
            // 46	Croacia	4

            /*
            |--------------------------------------------------------------------------
            | DÍA 1 – DIECISEISAVOS
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(38)->addHours(8)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 1,   // México
                'equipo_2' => 39,  // Austria
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(38)->addHours(12)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 5,   // Canadá
                'equipo_2' => 34,  // Senegal
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(38)->addHours(16)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 9,   // Brasil
                'equipo_2' => 31,  // Arabia Saudí
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(38)->addHours(20)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 13,  // EE. UU.
                'equipo_2' => 26,  // Egipto
            ],

            /*
            |--------------------------------------------------------------------------
            | DÍA 2 – DIECISEISAVOS
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(39)->addHours(8)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 17,  // Alemania
                'equipo_2' => 27,  // Irán
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(39)->addHours(12)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 21,  // Países Bajos
                'equipo_2' => 24,  // Túnez
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(39)->addHours(16)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 25,  // Bélgica
                'equipo_2' => 32,  // Uruguay
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(39)->addHours(20)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 29,  // España
                'equipo_2' => 20,  // Ecuador
            ],

            /*
            |--------------------------------------------------------------------------
            | DÍA 3 – DIECISEISAVOS
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(40)->addHours(8)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 33,  // Francia
                'equipo_2' => 19,  // Costa de Marfil
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(40)->addHours(12)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 37,  // Argentina
                'equipo_2' => 30,  // Cabo Verde
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(40)->addHours(16)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 41,  // Portugal
                'equipo_2' => 22,  // Japón
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(40)->addHours(20)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 45,  // Inglaterra
                'equipo_2' => 28,  // Nueva Zelanda
            ],

            /*
            |--------------------------------------------------------------------------
            | DÍA 4 – DIECISEISAVOS
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(41)->addHours(8)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 3,   // Corea del Sur
                'equipo_2' => 44,  // Colombia
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(41)->addHours(12)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 7,   // Catar
                'equipo_2' => 46,  // Croacia
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(41)->addHours(16)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 10,  // Marruecos
                'equipo_2' => 18,  // Curazao
            ],
            [
                'fase' => 'DIECISEISAVOS',
                'jornada' => 4,
                'fecha_partido' => $fecha_inicial->copy()->addDays(41)->addHours(20)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 15,  // Australia
                'equipo_2' => 2,   // Sudáfrica
            ],


            /*
            |--------------------------------------------------------------------------
            | JORNADA 5  OCTAVOS DE FINAL
            |--------------------------------------------------------------------------
            */

            /*
            |--------------------------------------------------------------------------
            | DÍA 1 – OCTAVOS
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'OCTAVOS',
                'jornada' => 5,
                'fecha_partido' => $fecha_inicial->copy()->addDays(43)->addHours(12)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 1,   // México
                'equipo_2' => 5,   // Canadá
            ],
            [
                'fase' => 'OCTAVOS',
                'jornada' => 5,
                'fecha_partido' => $fecha_inicial->copy()->addDays(43)->addHours(15)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 9,   // Brasil
                'equipo_2' => 13,  // EE. UU.
            ],
            [
                'fase' => 'OCTAVOS',
                'jornada' => 5,
                'fecha_partido' => $fecha_inicial->copy()->addDays(43)->addHours(18)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 17,  // Alemania
                'equipo_2' => 21,  // Países Bajos
            ],
            [
                'fase' => 'OCTAVOS',
                'jornada' => 5,
                'fecha_partido' => $fecha_inicial->copy()->addDays(43)->addHours(21)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 25,  // Bélgica
                'equipo_2' => 29,  // España
            ],

            /*
            |--------------------------------------------------------------------------
            | DÍA 2 – OCTAVOS
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'OCTAVOS',
                'jornada' => 5,
                'fecha_partido' => $fecha_inicial->copy()->addDays(44)->addHours(12)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 33,  // Francia
                'equipo_2' => 37,  // Argentina
            ],
            [
                'fase' => 'OCTAVOS',
                'jornada' => 5,
                'fecha_partido' => $fecha_inicial->copy()->addDays(44)->addHours(15)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 41,  // Portugal
                'equipo_2' => 45,  // Inglaterra
            ],
            [
                'fase' => 'OCTAVOS',
                'jornada' => 5,
                'fecha_partido' => $fecha_inicial->copy()->addDays(44)->addHours(18)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 3,   // República de Corea
                'equipo_2' => 7,   // Catar
            ],
            [
                'fase' => 'OCTAVOS',
                'jornada' => 5,
                'fecha_partido' => $fecha_inicial->copy()->addDays(44)->addHours(21)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 10,  // Marruecos
                'equipo_2' => 15,  // Australia
            ],


            /*
            |--------------------------------------------------------------------------
            | JORNADA 6  OCTAVOS DE FINAL
            |--------------------------------------------------------------------------
            */

            /*
            |--------------------------------------------------------------------------
            | DÍA 1 – CUARTOS DE FINAL
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'CUARTOS',
                'jornada' => 6,
                'fecha_partido' => $fecha_inicial->copy()->addDays(46)->addHours(16)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 1,   // México
                'equipo_2' => 9,   // Brasil
            ],
            [
                'fase' => 'CUARTOS',
                'jornada' => 6,
                'fecha_partido' => $fecha_inicial->copy()->addDays(46)->addHours(20)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 17,  // Alemania
                'equipo_2' => 29,  // España
            ],

            /*
            |--------------------------------------------------------------------------
            | DÍA 2 – CUARTOS DE FINAL
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'CUARTOS',
                'jornada' => 6,
                'fecha_partido' => $fecha_inicial->copy()->addDays(47)->addHours(16)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 37,  // Argentina
                'equipo_2' => 33,  // Francia
            ],
            [
                'fase' => 'CUARTOS',
                'jornada' => 6,
                'fecha_partido' => $fecha_inicial->copy()->addDays(47)->addHours(20)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 41,  // Portugal
                'equipo_2' => 15,  // Australia
            ],

            /*
            |--------------------------------------------------------------------------
            | JORNADA 7  OCTAVOS DE FINAL
            |--------------------------------------------------------------------------
            */

            /*
            |--------------------------------------------------------------------------
            | SEMIFINAL 1
            |--------------------------------------------------------------------------
            */

            [
                'fase' => 'SEMIFINALES',
                'jornada' => 7,
                'fecha_partido' => $fecha_inicial->copy()->addDays(49)->addHours(20)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 9,   // Brasil
                'equipo_2' => 29,  // España
            ],

            /*
            |--------------------------------------------------------------------------
            | SEMIFINAL 2
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'SEMIFINALES',
                'jornada' => 7,
                'fecha_partido' => $fecha_inicial->copy()->addDays(50)->addHours(20)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 37,  // Argentina
                'equipo_2' => 41,  // Portugal
            ],


            /*
            |--------------------------------------------------------------------------
            | JORNADA 8 TERCER LUGAR
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'TERCER_LUGAR',
                'jornada' => 8,
                'fecha_partido' => $fecha_inicial->copy()->addDays(52)->addHours(16)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 29,  // España (perdedor semifinal)
                'equipo_2' => 41,  // Portugal (perdedor semifinal)
            ],


            /*
            |--------------------------------------------------------------------------
            | JORNADA 9 FINALES
            |--------------------------------------------------------------------------
            */
            [
                'fase' => 'FINAL',
                'jornada' => 9,
                'fecha_partido' => $fecha_inicial->copy()->addDays(54)->addHours(20)->toDateTimeString(),
                'estadio_id' => rand(1,16),
                'equipo_1' => 9,   // Brasil
                'equipo_2' => 37,  // Argentina
            ],


        ]; 

        foreach($partidos as $partido) {

            $equipo_1 = $partido['equipo_1'];

            unset($partido['equipo_1']);

            $equipo_2 = $partido['equipo_2'];

            unset($partido['equipo_2']);

            $partido_db = Partido::create($partido);

            $equipo_partido = EquipoPartido::create([
                'partido_id' => $partido_db->id,
                'equipo_1' => $equipo_1,
                'equipo_2' => $equipo_2
            ]);

        }
    }
}
