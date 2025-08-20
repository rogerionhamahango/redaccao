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
        Schema::create('redacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jornalista_id')->constrained('jornalistas')->onDelete('cascade');
            $table->date('data');
            $table->string('agenda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redacao');
    }
};
