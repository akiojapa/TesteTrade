<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eliminacao extends Model
{
    use HasFactory;


    public function jogo() {
        return $this->belongsTo(Jogo::class);
    }

    public function times() {
        return $this->hasMany(Time::class, 'jogo_id');
    }

    
    

}
