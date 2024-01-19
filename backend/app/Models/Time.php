<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['nome_time', 'pais', 'liga', 'temporada', 'data_inscricao'];

    protected $table = 'times';
    protected $primaryKey = 'id_time';
    public $timestamps = false;

    public function jogos()
    {
        return $this->hasMany(Jogo::class, 'id_time_casa')->orWhere('id_time_visitante', $this->ID_Time);
    }

    public function eliminacoes()
    {
        return $this->hasMany(Eliminacao::class, 'id_time_eliminado');
    }

    public function campeonatos()
    {
        return $this->belongsToMany(Campeonato::class, 'times_campeonatos', 'id_time', 'id_campeonato');
    }
}