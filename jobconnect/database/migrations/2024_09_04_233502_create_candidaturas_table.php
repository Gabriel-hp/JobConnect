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
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('candidatos')->onDelete('cascade'); // FK para `candidatos`
            $table->foreignId('vaga_id')->constrained('vagas')->onDelete('cascade'); // FK para `vagas`
            $table->timestamp('data_candidatura')->useCurrent();
            $table->enum('status', ['em análise', 'pré-selecionado', 'rejeitado', 'selecionado'])->default('em análise');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidaturas');
    }
};
