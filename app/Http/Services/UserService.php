<?php

namespace App\Http\Services;

use App\Http\Requests\Auth\ApiLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService {

    public function getPaises()
    {
        return collect([ 
            [ 'id' => 1, 'nombre' => 'Guatemala' ], 
            [ 'id' => 2, 'nombre' => 'El Salvador' ],
            [ 'id' => 3, 'nombre' => 'Honduras' ],
            [ 'id' => 4, 'nombre' => 'Nicaragua' ],
            [ 'id' => 5, 'nombre' => 'Costa Rica'  ],
        ]);
    }

    public function getPais(string|int $id_pais)
    {
        $paises = $this->getPaises();
        
        return $paises->firstWhere('id', $id_pais);

    }

    public function getNombrePais($id_pais) 
    {
        $paises = $this->getPaises();
        
        $pais = $paises->firstWhere('id', $id_pais);

        return $pais['nombre'];
    }

    public function getUsers()
    {

        $participantes = User::where('status_user', 1)->get();

        return $participantes;

    }

    public function getUser(int $userId)
    {
        return User::find($userId);
    }

    public function getUserLogin(ApiLoginRequest $request)
    {
        return User::select('id', 'email', 'password', 'nombres', 'apellidos', 'status_user')
            ->where('email', $request->email)
            ->first();
    }

    public function getRanking($id_pais)
    {
        $participantes = User::select('id', 'nombres', 'apellidos', 'puntos', 'created_at')
            ->selectRaw('RANK() OVER (ORDER BY puntos DESC, name ASC) as posicion')
            ->has('predictions')
            ->where('status_user', 1)
            ->where('pais_id', $id_pais)
            ->get();

        return $participantes;

    }

    public function getUserRank($user)
    {
        $rankingQuery = User::select('id', 'nombres', 'apellidos', 'puntos', 'created_at')
            ->selectRaw('RANK() OVER (ORDER BY puntos DESC, name ASC) as posicion')
            ->has('predictions')
            ->where('status_user', 1)
            ->where('pais_id', $user->pais_id);

        
        $rank = DB::query()
            ->fromSub($rankingQuery, 'ranking')
            ->where('id', $user->id)
            ->value('posicion');

        $user->posicion = $rank;

        return $user;
    }

}