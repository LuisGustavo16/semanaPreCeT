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
        });
        
        Schema::table('chekins', function(Blueprint $table) {
            $table->foreign('idAluno')->references('idAluno')->on('alunos');
            $table->foreign('idTreino')->references('idTreino')->on('treino_amistosos');
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
