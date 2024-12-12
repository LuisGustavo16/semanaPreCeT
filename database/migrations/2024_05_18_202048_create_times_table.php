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
        Schema::create('times', function (Blueprint $table) {
            $table->bigIncrements('idTime');
            $table->unsignedBigInteger('idModalidade');
            $table->string('genero');
            $table->string('competicao');
            $table->timestamps();
        });

        Schema::table('times', function(Blueprint $table) {
            $table->foreign('idModalidade')->references('idModalidade')->on('modalidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};
