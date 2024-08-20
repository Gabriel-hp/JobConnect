<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();   // Chave primária da sessão, normalmente um token de sessão
            $table->foreignId('user_id')->nullable()->index();  // ID do usuário (opcional) para associar a sessão ao usuário
            $table->string('ip_address', 45)->nullable(); // IP do usuário, com suporte para IPv4 e IPv6
            $table->text('user_agent')->nullable();  // Informação sobre o navegador (opcional)
            $table->text('payload');  // Dados da sessão serializados
            $table->integer('last_activity')->index();  // Timestamp da última atividade
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
