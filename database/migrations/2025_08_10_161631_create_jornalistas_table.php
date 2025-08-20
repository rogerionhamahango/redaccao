<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jornalistas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('genero');
            $table->string('nuit')->unique();
            $table->date('data_admissao');
            $table->string('celular_principal');
            $table->string('celular_alternativo');
            $table->string('email')->unique();
            $table->string('carreira');
            $table->string('linguas_car');
            $table->string('categoria_actual');
            $table->string('redacao_de');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jornalistas');
    }
};
