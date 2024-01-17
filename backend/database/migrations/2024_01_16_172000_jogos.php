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
            $table->id('id_jogo');
            $table->unsignedBigInteger('id_time_casa');
            $table->unsignedBigInteger('id_time_visitante');
            $table->integer('gols_time_casa');
            $table->integer('gols_time_visitante');
            $table->string('fase');
            $table->date('data_jogo');
            $table->unsignedBigInteger('id_campeonato');
            $table->timestamps();

            $table->foreign('id_time_casa')->references('id_time')->on('times');
            $table->foreign('id_time_visitante')->references('id_time')->on('times');
            $table->foreign('id_campeonato')->references('id_campeonato')->on('campeonatos');
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
