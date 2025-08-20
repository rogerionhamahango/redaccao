<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redacao extends Model
{
    protected $table = "redacao";

    protected $fillable = [
        'jornalista_id',
        'data',
        'agenda',
     
    ];
}
