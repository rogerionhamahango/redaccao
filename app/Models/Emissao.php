<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emissao extends Model
{
    protected $table = "emissoes";

    protected $fillable = [
        'locutor_id',
        'lingua',
        'hora_inicial',
        'hora_final',
        'dia',
        'dia_semana',

    ];
}
