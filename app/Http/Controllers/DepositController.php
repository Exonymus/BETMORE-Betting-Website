<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Auth::user()->deposits;
        return view('deposit.index', compact('deposits'));
    }

    public function deposit(Request $request)
    {
        $user = Auth::user();
        $coinsBonus = (int)$request->input('coinsBonus');
        $user->coins += $coinsBonus;
        $user->save();

        Deposit::create([
            'user_id' => $user->id,
            'amount' => $coinsBonus,
        ]);

        return redirect()->back();
    }
}
