<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eliminacao extends Model
{
    protected $table = 'eliminacoes';
    protected $primaryKey = 'ID_Eliminacao';
    public $timestamps = false;

    public function timeEliminado()
    {
        return $this->belongsTo(Time::class, 'ID_Time_Eliminado');
    }

    public function jogo()
    {
        return $this->belongsTo(Jogo::class, 'ID_Jogo');
    }

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class, 'ID_Campeonato');
    }
}