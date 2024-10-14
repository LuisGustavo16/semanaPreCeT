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
        Schema::create('alunos_times', function (Blueprint $table) {
            $table->bigIncrements('idAlunosTimes');
            $table->unsignedBigInteger('idAluno');
            $table->unsignedBigInteger('idTime');
            $table->timestamps();
        });

        Schema::table('alunos_times', function(Blueprint $table) {
            $table->foreign('idAluno')->references('idAluno')->on('alunos');
            $table->foreign('idTime')->references('idTime')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos_times');
    }
};
