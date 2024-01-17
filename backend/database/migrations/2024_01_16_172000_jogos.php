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

        Schema::create('jogos', function (Blueprint $table) {
            $table->id('ID_Jogo');
            $table->unsignedBigInteger('ID_Time_Casa');
            $table->unsignedBigInteger('ID_Time_Visitante');
            $table->integer('Gols_Time_Casa');
            $table->integer('Gols_Time_Visitante');
            $table->string('Fase');
            $table->date('Data_Jogo');
            $table->unsignedBigInteger('ID_Campeonato');
            $table->timestamps();

            $table->foreign('ID_Time_Casa')->references('ID_Time')->on('times');
            $table->foreign('ID_Time_Visitante')->references('ID_Time')->on('times');
            $table->foreign('ID_Campeonato')->references('ID_Campeonato')->on('campeonatos');
        });
    

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
