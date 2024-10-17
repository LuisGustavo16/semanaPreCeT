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
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('idReserva');
            $table->unsignedBigInteger('idAluno');
            $table->date('dia');
            $table->string('local');
            $table->time('horarioInicio');
            $table->time('horarioFim');
            $table->string('finalidade');
            $table->string('status');
            $table->string('tipo');
            $table->string('observacao')->nullable();
            $table->integer('numeroPessoas');
            $table->timestamps();
        });

        Schema::table('reservas', function(Blueprint $table) {
            $table->foreign('idAluno')->references('idAluno')->on('alunos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
