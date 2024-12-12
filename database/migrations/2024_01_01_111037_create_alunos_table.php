<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            // Dados de autenticação
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            //Dados do aluno
            $table->string('turma')->nullable();
            $table->string('curso')->nullable();
            $table->string('matricula')->nullable();
            $table->string('descricaoEsportiva', 2000)->nullable();
            $table->string('tipo');
            $table->string('status');
            $table->string('genero')->nullable();
            $table->date('dataNascimento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
