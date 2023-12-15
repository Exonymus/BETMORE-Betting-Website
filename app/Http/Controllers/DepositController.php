<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::user() || Auth::user()->role->name == 'Operator')
            return redirect()->back();

        $deposits = Auth::user()->deposits;
        return view('deposit.index', compact('deposits'));
    }

    public function deposit(Request $request)
    {
        if (!Auth::user() || Auth::user()->role->name == 'Operator')
            return redirect()->back();

        $user = Auth::user();
        $coinsBonus = (int)$request->input('coinsBonus');
        $user->coins += $coinsBonus;
        $user->exp += $coinsBonus * 10;
        $user->save();

        Deposit::create([
            'user_id' => $user->id,
            'amount' => $coinsBonus,
        ]);

        return redirect()->back();
    }
}
