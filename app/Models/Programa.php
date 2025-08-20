<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = "programas";

    protected $fillable = [
        'produtor_id',
        'programa',
        'lingua',
        'duracao',
        'data_transmissao',
        'data_repeticao',
    ];
}
