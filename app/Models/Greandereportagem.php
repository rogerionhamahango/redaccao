<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Greandereportagem extends Model
{
    protected $table = 'grandereportagem';

    protected $fillable = [
    'jornalista_id',
    'tema',
    'mes_ano',
];
}
