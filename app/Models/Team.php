<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function matches()
    {
        return $this->hasMany(Match::class, 'team1_id')->orWhere('team2_id', $this->id);
    }

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }
}
