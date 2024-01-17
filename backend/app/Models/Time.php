<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    public function jogo() {
        return $this->belongsTo(Jogo::class);
    }

    public function eliminacao() {
        return $this->belongsTo(Eliminacao::class);
    }

    

}
