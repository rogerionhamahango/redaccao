<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jornalista extends Model
{
    protected $table = "jornalistas";

    protected $fillable = [
        'nome_completo',
        'abreviatura',
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

    // 🔹 Faz Laravel tratar data como objeto de data (Carbon automático)
    protected $casts = [
        'data_admissao' => 'date',
    ];

    // 🔹 Relação: jornalista pode ter várias emissões
    public function emissoes()
    {
        return $this->hasMany(Emissao::class, 'locutor_id');
    }

    // ===============================
    // LÓGICA DE TEMPO DE SERVIÇO
    // ===============================

    // 🔹 Tempo de serviço (anos inteiros)
   public function getTempoServicoAttribute()
{
    return $this->data_admissao
        ? $this->data_admissao->diffInYears(now())
        : 0;
}

    // 🔹 Tempo detalhado (anos + meses)
    public function getTempoServicoDetalhadoAttribute()
    {
        return $this->data_admissao
            ? $this->data_admissao->diff(now())->format('%y anos, %m meses')
            : null;
    }

    // 🔹 Anos restantes para 35 anos de serviço
    public function getAnosFaltantesAttribute()
    {
        return max(0, 36 - $this->tempo_servico);
    }

    // 🔹 Verifica se já pode reformar (35 anos de serviço)
    public function getAptoReformaPorServicoAttribute()
    {
        return $this->tempo_servico >= 35;
    }

    // 🔹 Idade (opcional se quiseres adicionar data_nascimento depois)
    public function getIdadeAttribute()
    {
        return $this->data_nascimento
            ? $this->data_nascimento->diffInYears(now())
            : null;
    }

    // 🔹 Regra simples de status
    public function getStatusReformaAttribute()
    {
        if ($this->tempo_servico >= 35) {
            return 'Apto por tempo de serviço';
        }

        return 'Em atividade';
    }
}