<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartialsController extends Controller
{
    public function chat()
    {
        $messages = Message::latest()->get();
        return view('partials.chat', compact('messages'));
    }

    public function chat_store(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        Message::create([
            'user_id' => Auth::user()->id,
            'message' => $request->input('message'),
        ]);

        return response()->json(['status' => 'success']);
    }
    public function bets__carousel()
    {
        $matches = Match::all();
        return view('partials.bets-carousel', compact('matches'));
    }
    public function loading__screen()
    {
        return view('partials.loading-screen');
    }
    public function sorry__screen()
    {
        return view('partials.sorry-screen');
    }
    public function bet__card()
    {
        return view('partials.bet-card');
    }
}
