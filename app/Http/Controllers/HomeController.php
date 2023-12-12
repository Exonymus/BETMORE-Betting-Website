<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

    public function profile($id)
    {
        $user = User::find($id)->first();
        if (Auth::user() and
            (Auth::user()->id == $id or Auth::user()->role->name != 'user'))
            return view('home.profile', compact('user'));
        else
            return view('404');
    }
}
