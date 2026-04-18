<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Folga extends Model
{
    use HasFactory;
    protected $fillable = [
        'jornalista_id',
        'dia',
        'dia_semana',
    ];

    public function jornalista()
    {
        return $this->belongsTo(Jornalista::class);
    }

}

 
