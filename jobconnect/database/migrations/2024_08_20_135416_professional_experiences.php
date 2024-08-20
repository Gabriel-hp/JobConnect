<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('professional_experience')) {
            Schema::create('professional_experiences', function (Blueprint $table) {
                $table->id();
                $table->foreignId('resume_id')->constrained('resumes')->onDelete('cascade');
                $table->string('cargo');
                $table->string('empresa');
                $table->date('data_inicio');
                $table->date('data_fim')->nullable();
                $table->text('descricao_responsabilidades')->nullable();
                $table->string('localizacao')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('professional_experience');
    }
};
