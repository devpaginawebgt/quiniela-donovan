<?php

namespace Database\Seeders;

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
            [
                'name'             =>  'dennisdev',
                'email'            =>  'dev@paginawebguatemala.com',
                'codigo_id'        =>  1,
                'pais_id'          =>  1,
                'password'         =>  Hash::make('FScomunica2'),
                'nombres'          =>  'Dennis',
                'apellidos'        =>  'PWG',
                'telefono'         =>  '63443212',
                'numero_documento' =>  '1234567891111',
            ]
        ];

        DB::table('users')->insert($users);
    }
}
