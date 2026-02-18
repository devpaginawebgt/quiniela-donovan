<?php

namespace App\Http\Services;

use App\Http\Requests\Auth\ApiLoginRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService {

    public function getPaises()
    {
        return Country::select('name', 'country_code', 'timezone', 'is_active')->get();
    }

    public function getPais(string|int $id_pais)
    {   
        return Country::find($id_pais);
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