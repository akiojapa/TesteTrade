<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eliminacao extends Model
{
    protected $table = 'eliminacoes';
    protected $primaryKey = 'id_eliminacao';
    public $timestamps = false;

    public function timeEliminado()
    {
        return $this->belongsTo(Time::class, 'id_time_eliminado');
    }

    public function jogo()
    {
        return $this->belongsTo(Jogo::class, 'id_jogo');
    }

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class, 'id_campeonato');
    }
}