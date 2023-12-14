<?php

namespace App\Http\Controllers;

use App\Jobs\CheckMatchesDataJob;
use App\Jobs\LoadDataFromApiJob;
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
}
