<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilizador extends Authenticatable
{

     use HasFactory;

    protected $table = "utilizador";

    protected $fillable = [
    'nome_completo',
    'nome_utilizador',
    'email',
    'telefone',
    'tipo_utilizador',
    'senha',
    ];
    protected $hidden = [
        'senha',
        'remember_token',
    ];
    
    //Para encriptar a senha

    protected function casts(): array{
        return [
            'email_verified_at'=> 'datetime',
            'senha'=>'hashed',
        ];
    }
    
    }
