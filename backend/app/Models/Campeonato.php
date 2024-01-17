<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    
    
    protected $table = 'campeonatos';
    protected $primaryKey = 'ID_Campeonato';
    public $timestamps = false;

    public function jogos()
    {
        return $this->hasMany(Jogo::class, 'ID_Campeonato');
    }

    public function eliminacoes()
    {
        return $this->hasMany(Eliminacao::class, 'ID_Campeonato');
    }

    public function times()
    {
        return $this->belongsToMany(Time::class, 'times_campeonatos', 'ID_Campeonato', 'ID_Time');
    }

    protected static function booted(){

        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome', 'desc');
        });

    }

    public function scopeActive(Builder $query) {

        return $query->where('active', true);
    }

}