<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function equipos($jornada)
    {
        return $this->belongsToMany(Equipo::class,'equipo_partidos');
    }
}
