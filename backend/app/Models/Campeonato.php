<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;    
    
    protected $table = 'campeonatos';
    protected $primaryKey = 'id_campeonato';
    public $timestamps = false;

    public function jogos()
    {
        return $this->hasMany(Jogo::class, 'id_campeonato');
    }

    public function eliminacoes()
    {
        return $this->hasMany(Eliminacao::class, 'id_campeonato');
    }

    public function times()
    {
        return $this->belongsToMany(Time::class, 'times_campeonatos', 'id_campeonato', 'id_time');
    }

    protected static function booted(){

        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome_campeonato', 'desc');
        });

    }

    public function scopeActive(Builder $query) {

        return $query->where('active', true);
    }

}