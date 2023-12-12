<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BetsController extends Controller
{
    public function bet(Request $request)
    {
        $amount = (double)$request->input('amount');
        $match = Match::find($request->input('match_id'));
        $teamId = $match->{$request->input('team_id')}->id;
        $coefficient = $match->{$request->input('team_id').'_cef'};

        if (Auth::user()->coins < $amount)
            return response()->json(['message' => 'Error, not enough coins']);

        $bet  = new Bet();
        $bet->amount = $amount;
        $bet->coefficient = $coefficient;
        $bet->match_id = $match->id;
        $bet->user_id = Auth::user()->id;
        $bet->team_id = $teamId;
        $bet->save();

        Auth::user()->coins -= $amount;
        Auth::user()->save();

        return response()->json(['message' => 'Success']);
    }
}
