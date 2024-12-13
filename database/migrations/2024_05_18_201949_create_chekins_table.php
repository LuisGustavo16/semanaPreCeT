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
        Schema::create('chekins', function (Blueprint $table) {
            $table->bigIncrements('idCheckin');
            $table->unsignedBigInteger('idAluno');
            $table->unsignedBigInteger('idTreino');
            $table->timestamps();
    
            // Definição das chaves estrangeiras
            $table->foreign('idAluno')->references('id')->on('alunos');
            $table->foreign('idTreino')
                ->references('idTreino')
                ->on('treino_amistosos')
                ->onDelete('cascade'); // Deleção em cascata configurada corretamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chekins');
    }
};
