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
        Schema::create('treino_amistosos', function (Blueprint $table) {
            $table->bigIncrements('idTreino');
            $table->unsignedBigInteger('idModalidade');
            $table->date('dia');
            $table->time('horario');
            $table->string('genero');
            $table->string('publico');
            $table->string('local');
            $table->string('responsavel');
            $table->string('observacao')->nullable();
            $table->timestamps();
        });

        Schema::table('treino_amistosos', function(Blueprint $table) {
            $table->foreign('idModalidade')->references('idModalidade')->on('modalidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treino_amistosos');
    }
};
