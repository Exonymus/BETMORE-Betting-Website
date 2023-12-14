<?php

namespace App\Http\Controllers;

use App\Jobs\CheckMatchesDataJob;
use App\Jobs\LoadDataFromApiJob;
use App\Models\GameMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class MatchesController extends Controller
{
    public function loadDataFromApi()
    {
        if (!Auth::user() || !Auth::user()->role->name == 'admin')
            return redirect()->route('home.index');

        LoadDataFromApiJob::dispatch('cs2');
        LoadDataFromApiJob::dispatch('vlrnt');
        LoadDataFromApiJob::dispatch('dota2');
        LoadDataFromApiJob::dispatch('lol');

        return redirect()->back();
    }

    public function run_schedule()
    {
        if (!Auth::user() || !Auth::user()->role->name == 'admin')
            return redirect()->route('home.index');

        CheckMatchesDataJob::dispatch();

        return redirect()->back();
    }

    public function simulate()
    {
        if (!Auth::user() || !Auth::user()->role->name == 'admin')
            return redirect()->route('home.index');

        $matches = GameMatch::all();

        return view('admin.matches', compact('matches'));
    }

    public function win1(Request $request, $id)
    {
        if (!Auth::user() || !Auth::user()->role->name == 'admin')
            return redirect()->route('home.index');

        $match = GameMatch::where('id', $id)->first();
        $match->handleMatchEnd(0);

        return redirect()->back();
    }

    public function win2(Request $request, $id)
    {
        if (!Auth::user() || !Auth::user()->role->name == 'admin')
            return redirect()->route('home.index');

        $match = GameMatch::where('id', $id)->first();
        $match->handleMatchEnd(1);

        return redirect()->back();
    }

    public function load_details(Request $request, $id)
    {
        if (!Auth::user() || !Auth::user()->role->name == 'admin')
            return redirect()->route('home.index');

        $match = GameMatch::where('id', $id)->first();
        $match->loadDetails();

        return redirect()->back();
    }
}
