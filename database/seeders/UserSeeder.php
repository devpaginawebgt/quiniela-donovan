<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            // [
            //     'name'             =>  now(),
            //     'email'            =>  'dev@paginawebguatemala.com',
            //     'codigo_id'        =>  1,
            //     'pais_id'          =>  1,
            //     'password'         =>  Hash::make('FScomunica2'),
            //     'nombres'          =>  'Dennis',
            //     'apellidos'        =>  'PWG',
            //     'telefono'         =>  '63443212',
            //     'numero_documento' =>  '1234567891111',
            //     'created_at'       =>  (Carbon::now())->toDateTimeString(),
            // ],
            // [
            //     'name'             =>  now(),
            //     'email'            =>  'app@paginawebguatemala.com',
            //     'codigo_id'        =>  2,
            //     'pais_id'          =>  1,
            //     'password'         =>  Hash::make('FScomunica2'),
            //     'nombres'          =>  'Dwight',
            //     'apellidos'        =>  'PWG',
            //     'telefono'         =>  '63443212',
            //     'numero_documento' =>  '1234567891111',
            //     'created_at'       =>  (Carbon::now())->toDateTimeString(),
            // ],
            [
                'name'             =>  now(),
                'email'            =>  'revisor@gmail.com',
                'codigo_id'        =>  13,
                'pais_id'          =>  1,
                'password'         =>  Hash::make('Adm63454'),
                'nombres'          =>  'Revisor',
                'apellidos'        =>  'Google',
                'telefono'         =>  '39987867',
                'numero_documento' =>  '1234567891112',
                'created_at'       =>  (Carbon::now())->toDateTimeString(),
            ],
            [
                'name'             =>  now(),
                'email'            =>  'revisorios@gmail.com    ',
                'codigo_id'        =>  14,
                'pais_id'          =>  1,
                'password'         =>  Hash::make('Adm72338'),
                'nombres'          =>  'Revisor',
                'apellidos'        =>  'IOS',
                'telefono'         =>  '83323462',
                'numero_documento' =>  '1234567891113',
                'created_at'       =>  (Carbon::now())->toDateTimeString(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
