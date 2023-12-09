<?php

namespace App\Http\Controllers;

use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function approve()
    {
        return view('withdraw.approves');
    }
    public function request(Request $request)
    {
        $user = Auth::user();
        $coinsBonus = (int)$request->input('coinsWithdraw');
        if ($coinsBonus > $user->coins)
        {
            return redirect()->back()->withErrors(['coins' => 'Not enough coins, current balance : ' . $user->coins]);
        }

        $user->coins -= $coinsBonus;
        $user->save();

        WithdrawRequest::create([
            'user_id' => $user->id,
            'amount' => $coinsBonus,
        ]);

        return redirect()->back();
    }

    public function index()
    {
        $withdrawRequests = Auth::user()->withdrawRequests;
        return view('withdraw.index', compact('withdrawRequests'));
    }
}
