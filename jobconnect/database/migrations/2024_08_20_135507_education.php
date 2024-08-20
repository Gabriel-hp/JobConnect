<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('education')) {
            Schema::create('education', function (Blueprint $table) {
                $table->id();
                $table->foreignId('resume_id')->constrained('resumes')->onDelete('cascade');
                $table->string('instituicao');
                $table->string('grau');
                $table->string('curso');
                $table->date('data_inicio');
                $table->date('data_fim')->nullable();
                $table->text('descricao')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
