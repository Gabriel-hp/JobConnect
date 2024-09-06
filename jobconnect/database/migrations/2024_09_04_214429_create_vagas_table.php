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
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            
            $table->text('descricao');
            $table->string('cidade');
            $table->string('nome_empresa');
            $table->enum('regime_contratacao', ['PJ', 'CLT']);
            $table->boolean('pcd')->default(false); // Vaga exclusiva para PCD
            $table->enum('modalidade_trabalho', ['Home Office', 'Presencial', 'Híbrida']);
            $table->enum('area', ['Tecnologia', 'Contabil', 'Serviço gerais', 'Industria', 'Saude', 'Educacao', 'Administrativo','outros']);
            $table->timestamp('data_postagem')->useCurrent(); // Define a data de postagem como atual
            $table->string('escolaridade');
            $table->decimal('salario', 8, 2)->nullable(); // Opcional
            $table->text('beneficios')->nullable(); // Opcional
            $table->enum('status', ['aberta', 'fechada'])->default('aberta');
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para users
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
