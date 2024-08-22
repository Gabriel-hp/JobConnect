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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            
            // Dados pessoais
            $table->string('nome_completo');
            $table->date('data_nascimento')->nullable();
            $table->string('telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('link_linkedin')->nullable();
            $table->string('link_portfolio')->nullable();
            
            // Experiências profissionais e formação acadêmica
            $table->text('experiencia_profissional')->nullable(); // ou JSON
            $table->text('formacao_academica')->nullable(); // ou JSON

            // Colunas JSON para habilidades, idiomas e cursos
            $table->json('habilidades')->nullable(); // Armazena um array de habilidades
            $table->json('idiomas')->nullable(); // Armazena um array de idiomas e proficiências
            $table->json('cursos')->nullable(); // Armazena um array de cursos concluídos

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
