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
        Schema::create('mensagems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("conteudo");
            $table->string('tipo');
            $table->dateTime("dateTime");
            $table->unsignedBigInteger('idAluno');
        });

        Schema::table('mensagems', function(Blueprint $table) {
            $table->foreign('idAluno')->references('id')->on('alunos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensagems');
    }
};
