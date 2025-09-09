<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emissao extends Model
{
    protected $table = "emissoes";

    protected $fillable = [
        'locutor_id',
        'hora_inicial',
        'hora_final',
        'dia',
        'dia_semana',

    ];

    public function jornalista(){
        return $this->belongsTo(Jornalista::class, 'locutor_id');
    }
}
