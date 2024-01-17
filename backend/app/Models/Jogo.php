<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    public function campeonato() {
        return $this->belongsTo(Campeonato::class);
    }

    public function times() {
        return $this->hasMany(Time::class, 'jogo_id');
    }
    
    public function eliminacao() {
        return $this->hasOne(Eliminacao::class, 'jogo_id');
    }

    
}
    

