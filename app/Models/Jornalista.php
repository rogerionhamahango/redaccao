<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jornalista extends Model
{
    protected $table = "jornalistas";

    protected $fillable = [
        'nome_completo',
        'genero',
        'nuit',
        'data_admissao',
        'celular_principal',
        'celular_alternativo',
        'email',
        'carreira',
        'linguas_car',
        'categoria_actual',
        'redacao_de',

    ];
}
