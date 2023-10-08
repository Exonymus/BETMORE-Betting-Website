<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function getTeams()
    {
        return [
            'team1' => $this->team1,
            'team2' => $this->team2,
        ];
    }

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }
}
