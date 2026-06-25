<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edicao extends Model
{
    protected $table = "edicoes";
    
    protected $fillable = [
        'id_jornalista',
        'dia',
        'horas',
        'lingua'
    ];

    public function jornalista(){
        return $this->belongsTo(Jornalista::class, 'id_jornalista');
    }
}
