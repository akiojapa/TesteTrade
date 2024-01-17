<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    
    
    public function jogos() {
        
        return $this->hasMany(Jogo::class, 'campeonato_id');
    }
    
    public function eliminacoes() {
        return $this->hasManyThrough(Eliminacao::class, Jogo::class, 'campeonato_id', 'jogo_id');
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