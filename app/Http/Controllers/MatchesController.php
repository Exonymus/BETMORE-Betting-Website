<?php

namespace App\Http\Controllers;

use App\Jobs\LoadDataFromApiJob;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class MatchesController extends Controller
{
    public function loadDataFromApi()
    {
        if (!Auth::user() || !Auth::user()->role->name == 'admin')
            return redirect()->route('home.index');

        Artisan::call('queue:work');

        LoadDataFromApiJob::dispatch('cs2');
        LoadDataFromApiJob::dispatch('vlrnt');
        LoadDataFromApiJob::dispatch('dota2');
        LoadDataFromApiJob::dispatch('lol');
        return redirect()->back();
    }
}
