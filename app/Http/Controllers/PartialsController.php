<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartialsController extends Controller
{
    public function chat()
    {
        return view('partials.chat');
    }
    public function bets__carousel()
    {
        return view('partials.bets-carousel');
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
