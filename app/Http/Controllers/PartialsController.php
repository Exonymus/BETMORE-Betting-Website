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
        return view('partials.bets__carousel');
    }
    public function loading__screen()
    {
        return view('partials.loading__screen');
    }
    public function sorry__screen()
    {
        return view('partials.sorry__screen');
    }
}
