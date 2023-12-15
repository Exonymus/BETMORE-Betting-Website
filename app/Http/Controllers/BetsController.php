<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\GameMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bet(Request $request)
    {
        $amount = (double)$request->input('amount');
        $insured = (int)$request->input('insured');
        $match = GameMatch::find($request->input('match_id'));
        if ($match->live == 1) $insured = 0;
        $teamId = $match->{$request->input('team_id')}->id;
        $coefficient = $match->{$request->input('team_id').'_cef'};

        Log::info($insured);

        if (!Auth::user() || Auth::user()->role->name == 'Operator')
            return response()->json(['error' => 'Error, who are you?'], 500);

        if (Auth::user()->coins < $amount)
            return response()->json(['error' => 'Error, not enough coins'], 500);

        if ($insured and Auth::user()->noloses < $amount)
            return response()->json(['error' => 'Error, not enough noloses'], 500);

        if ($amount <= 0)
            return response()->json(['error' => 'Too low amount'], 500);

        if ($amount >= 10000)
            return response()->json(['error' => 'Too high amount'], 500);

        $bet  = new Bet();
        $bet->amount = $amount;
        $bet->coefficient = $coefficient;
        $bet->match_id = $match->id;
        $bet->user_id = Auth::user()->id;
        $bet->team_id = $teamId;
        $bet->insured = $insured;
        $bet->save();

        Auth::user()->coins -= $amount;
        if ($insured)
            Auth::user()->noloses -= $amount;
        Auth::user()->save();

        return response()->json(['message' => 'Success']);
    }
}
