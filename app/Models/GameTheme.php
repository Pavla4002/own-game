<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTheme extends Model
{
    use HasFactory;

    public function theme(){
        return $this->belongsTo(Theme::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
}
