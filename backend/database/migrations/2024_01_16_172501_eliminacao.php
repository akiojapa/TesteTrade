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

        Schema::create('eliminacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campeonato_id');
            $table->foreignId('time_eliminado');
            $table->unsignedBigInteger('posicao_eliminacao');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eliminacao');
    }
};
