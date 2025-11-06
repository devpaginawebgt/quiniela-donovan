<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function verParticipantes(){

        $participantes = User::where('status_user', 1)->get();
        
        $paises = ['Guatemala','El Salvador','Honduras','Nicaragua','Costa Rica'];

        foreach ($participantes as $participante) {

            $index_pais = $participante->pais_id - 1;

            $participante->pais = $paises[$index_pais];

        }

        return view('modulos.participantes',['participantes' => $participantes]);
    }
}
