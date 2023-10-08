<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function game()
    {
        return $this->hasOne(Game::class);
    }

    public function matchs()
    {
        return $this->hasMany(Match::class, 'team1_id')->orWhere('team2_id', $this->id);
    }

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }
}
