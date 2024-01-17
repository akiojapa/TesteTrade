<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    protected $table = 'jogos';
    protected $primaryKey = 'ID_Jogo';
    public $timestamps = false;

    public function timeCasa()
    {
        return $this->belongsTo(Time::class, 'ID_Time_Casa');
    }

    public function timeVisitante()
    {
        return $this->belongsTo(Time::class, 'ID_Time_Visitante');
    }

    public function eliminacao()
    {
        return $this->hasOne(Eliminacao::class, 'ID_Jogo');
    }

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class, 'ID_Campeonato');
    }
}

    

