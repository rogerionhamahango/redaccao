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
        Schema::create('emissoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locutor_id')->constrained('jornalistas')->onDelete('cascade');
            $table->string('lingua');
            $table->string('hora_inicial');
            $table->string('hora_final');
            $table->date('dia');
            $table->string('dia_semana');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emissoes');
    }
};
