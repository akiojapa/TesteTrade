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
            $table->id('id_eliminacao');
            $table->unsignedBigInteger('id_time_eliminado');
            $table->unsignedBigInteger('id_jogo');
            $table->string('posicao_eliminacao');
            $table->unsignedBigInteger('id_campeonato');
            $table->timestamps();

            $table->foreign('id_time_eliminado')->references('id_time')->on('times');
            $table->foreign('id_jogo')->references('id_jogo')->on('jogos');
            $table->foreign('id_campeonato')->references('id_campeonato')->on('campeonatos');
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
