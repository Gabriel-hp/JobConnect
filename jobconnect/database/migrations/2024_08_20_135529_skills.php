<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('skills')) {
            Schema::create('skills', function (Blueprint $table) {
                $table->id();
                $table->foreignId('resume_id')->constrained('resumes')->onDelete('cascade');
                $table->string('habilidade');
                $table->string('nivel')->default('iniciante')->change(); // Ex: básico, intermediário, avançado
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
