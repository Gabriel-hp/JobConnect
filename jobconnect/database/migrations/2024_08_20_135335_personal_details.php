<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('personal_details')) {
            Schema::create('personal_details', function (Blueprint $table) {
                $table->id();
                $table->foreignId('resume_id')->constrained('resumes')->onDelete('cascade');
                $table->string('nome_completo');
                $table->date('data_nascimento')->nullable();
                $table->string('telefone')->nullable();
                $table->string('endereco')->nullable();
                $table->string('nacionalidade')->nullable();
                $table->string('estado_civil')->nullable();
                $table->string('link_linkedin')->nullable();
                $table->string('link_portfolio')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_details');
    }
};
