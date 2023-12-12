<?php

namespace App\Http\Controllers;

use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function approve()
    {
        if (Auth::user()->role->name == 'user')
            return redirect()->route('home.index');

        $withdrawRequests = WithdrawRequest::all()->where('status', 'waiting');
        return view('withdraw.approve', compact('withdrawRequests'));
    }
    public function request(Request $request)
    {
        if (Auth::user()->role->name != 'user')
            return redirect()->route('home.index');

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
        if (Auth::user()->role->name != 'user')
            return redirect()->route('home.index');

        $withdrawRequests = Auth::user()->withdrawRequests;
        return view('withdraw.index', compact('withdrawRequests'));
    }

    public function decline_id(Request $request, $id)
    {
        if (Auth::user()->role->name == 'user')
            return redirect()->route('home.index');

        $withdrawRequest = WithdrawRequest::all()->where('id', $id)->first();
        $withdrawRequest->status = 'declined';
        $withdrawRequest->user->coins += $withdrawRequest->amount;
        $withdrawRequest->user->save();
        $withdrawRequest->save();
        return redirect()->back();
    }

    public function approve_id(Request $request, $id)
    {
        if (Auth::user()->role->name == 'user')
            return redirect()->route('home.index');

        $withdrawRequest = WithdrawRequest::all()->where('id', $id)->first();
        $withdrawRequest->status = 'approved';
        $withdrawRequest->save();
        return redirect()->back();
    }
}
