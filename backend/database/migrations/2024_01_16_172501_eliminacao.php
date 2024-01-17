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

        Schema::create('eliminacoes', function (Blueprint $table) {
            $table->id('ID_Eliminacao');
            $table->unsignedBigInteger('ID_Time_Eliminado');
            $table->unsignedBigInteger('ID_Jogo');
            $table->string('Posicao_Eliminacao');
            $table->unsignedBigInteger('ID_Campeonato');
            $table->timestamps();

            $table->foreign('ID_Time_Eliminado')->references('ID_Time')->on('times');
            $table->foreign('ID_Jogo')->references('ID_Jogo')->on('jogos');
            $table->foreign('ID_Campeonato')->references('ID_Campeonato')->on('campeonatos');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
