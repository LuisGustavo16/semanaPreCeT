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
        Schema::create('jogos_times', function (Blueprint $table) {
            $table->bigIncrements('idJogoTime');
            $table->unsignedBigInteger('idTime');
            $table->time("horarioInicio");
            $table->time("horarioFim");
            $table->date("dia");
            $table->string("local");
            $table->string("observacao")->nullable();
            $table->timestamps();
        });

        Schema::table('jogos_times', function(Blueprint $table) {
            $table->foreign('idTime')->references('idTime')->on('times')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos_times');
    }
};
