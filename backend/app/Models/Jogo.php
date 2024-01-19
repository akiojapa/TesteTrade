<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{

    protected $fillable = ['id_time_casa', 'id_time_visitante', 'id_campeonato', 'data_jogo', 'gols_time_casa', 'gols_time_visitante', 'fase'];

    protected $table = 'jogos';
    protected $primaryKey = 'id_Jogo';
    public $timestamps = false;

    public function timeCasa()
    {
        return $this->belongsTo(Time::class, 'id_time_casa');
    }

    public function timeVisitante()
    {
        return $this->belongsTo(Time::class, 'id_time_visitante');
    }

    public function eliminacao()
    {
        return $this->hasOne(Eliminacao::class, 'id_jogo');
    }

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class, 'id_campeonato');
    }
}

    

