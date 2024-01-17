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
            $table->id('ID_Time');
            $table->string('Nome_Time');
            $table->string('Pais'); 
            $table->string('Liga');
            $table->string('Temporada'); 
            $table->date('Data_Inscricao');
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
