<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PremioController extends Controller
{   
    public function verTablaPremios()
    {
        
        $id_pais = Auth::user()->pais_id;

        $premios = DB::select(
            "SELECT 
                * 
            FROM 
                premios 
            WHERE 
                pais_id = $id_pais"
        );

        return view('modulos.tabla-premios', [
            'premios' => $premios
        ]);

    }

}
