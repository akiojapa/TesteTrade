<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';
    protected $primaryKey = 'ID_Time';
    public $timestamps = false;

    public function jogos()
    {
        return $this->hasMany(Jogo::class, 'ID_Time_Casa')->orWhere('ID_Time_Visitante', $this->ID_Time);
    }

    public function eliminacoes()
    {
        return $this->hasMany(Eliminacao::class, 'ID_Time_Eliminado');
    }

    public function campeonatos()
    {
        return $this->belongsToMany(Campeonato::class, 'times_campeonatos', 'ID_Time', 'ID_Campeonato');
    }
}