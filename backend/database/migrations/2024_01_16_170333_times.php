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
            $table->id('id_time');
            $table->string('nome_time');
            $table->string('pais'); 
            $table->string('liga');
            $table->string('temporada'); 
            $table->date('data_inscricao');
            $table->timestamps();
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
