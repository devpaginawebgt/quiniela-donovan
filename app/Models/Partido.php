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
       'jornada_id',
       'fecha_partido',
       'estadio_id',
       'jugado',
       'estado',
    ];

    protected function casts(): array
    {
        return [ 'fecha_partido' => 'datetime' ];
    }

}
