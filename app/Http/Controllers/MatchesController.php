<?php

namespace App\Http\Controllers;

use App\Jobs\LoadDataFromApiJob;

class MatchesController extends Controller
{
    public function loadDataFromApi()
    {
        LoadDataFromApiJob::dispatch('cs2');
        LoadDataFromApiJob::dispatch('vlrnt');
        LoadDataFromApiJob::dispatch('dota2');
        LoadDataFromApiJob::dispatch('lol');
        return redirect()->back();
    }
}
