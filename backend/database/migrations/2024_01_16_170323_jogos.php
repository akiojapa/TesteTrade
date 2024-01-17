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
            $table->id();
            $table->foreignId('campeonato_id')->onDelete('cascade');
            $table->foreignId('time1_id');
            $table->foreignId('time2_id');
            $table->integer('time1_gols');
            $table->integer('time2_gols');
            $table->integer('fase');
            $table->timestamp('data_jogo');
            $table->timestamps();
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
