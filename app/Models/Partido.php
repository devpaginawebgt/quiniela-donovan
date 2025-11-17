<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
       'fase',
       'jornada',
       'fecha_partido',
       'estadio_id',
       'jugado',
       'estado',
    ];

}
