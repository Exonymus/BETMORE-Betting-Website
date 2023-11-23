<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function approve()
    {
        return view('withdraw.approves');
    }

    public function index()
    {
        return view('withdraw.index');
    }
}
